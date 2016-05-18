<?php

class Main {

    private $machines = array();
    private $elements;
    private $timer;
    private $queue;

    public function __construct() {
        error_reporting(E_ALL & ~E_NOTICE);
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET' :
                Template::getForm();
               
                break;
            case 'POST' :
                Template::postForm($_REQUEST['numbers']);
                $this->init($_REQUEST['machines'], $_REQUEST['resolution']);
                $this->run();
                break;
            
                
        }
    }

    public function init($machines, $resolution) { //dopisac obsluge bezwzblegych
        for ($i = 1; $i <= $machines; $i++) {
            $this->machines[$i] = new Machine(new Timer());
        }

        $this->timer = new Timer();
        $this->timer->setResolution($resolution);
        $this->queue = new Queue;
        $arrtime = 0;

        foreach ($_POST['req'] as $key => $value) {
            $arrtime = (float) $value['arrival'] + $arrtime;
            $this->elements[] = new Element($key, (float) $value['execution'], $arrtime);
        }
    }

    public function run() {
        print '<pre>';
        do {

            $this->moveToQueue();
            $this->moveToMachine();
            
            $this->update();

         
        } while ($this->is_over());
        Statistics::generate($this->elements,$this->machines,$this->queue,  $this->timer->getTime()-Timer::getResolution());
    }

    function update(){
       $this->timer->nextCycle();
        $this->queue->update($this->timer->getTime());
        foreach ($this->machines as  $machine)
            $machine->update(); 
        
    }
    
    public function moveToQueue() {
        foreach ($this->elements as $element) {
            if ($this->timer->getTime() == $element->getTime('arri')) {
                $this->queue->enqueue($element);
                Statistics::addEvent($this->timer->getTime(), '<font color=green>przybył element nr' . $element->id.'</font>');
            }
        }
    }
    
    function is_over() {
        foreach ($this->elements as $element) {
            if($element->end == false) {
                return true;
            } 
        }
        
    }

    public function moveToMachine() {
        foreach ($this->machines as $key => $machine) {

            if ($machine->busy($this->timer->getTime())) {
                
                $element = $this->queue->dequeue();
                if ($element instanceof Element) {
                    $machine->setElement($element, $this->timer->getTime());
                    Statistics::addEvent($this->timer->getTime(), '<font color=blue>elemnt nr. ' . $element->id . ' przeszedł z kolejki do maszyny nr :' . $key.'</font');
                }
            }
        }
    }

}

class Queue {
    private $status;
    private $queue = array();

    function enqueue(Element $element) {
        array_unshift($this->queue, $element);
    }

    function dequeue() {
        return array_pop($this->queue);
    }

    function count() {
        return count($this->queue);
    }
    public function getStatus() {
        return $this->status;
    }
    function update($timer) {
        $this->status[$timer] = $this->count();
        foreach ($this->queue as $queue) {
            $queue->update(Element::QUEUE);
        }
    }
}

class Element {

    const QUEUE = 'QUEUE';
    const MACHINE = 'MACHINE';

    public $id = 0;
    public $time = array();
    public $end = 0;

    public function __construct($id, $exec, $arr) {
        $this->id = $id;
        $this->time['exec'] = $exec;
        $this->time['arri'] = $arr;
        $this->end = 0;
    }
    public function getTime($a) {
        return $this->time[$a];
    }
    function update($type) {
        switch ($type) {
            case self::QUEUE :
                $this->time[self::QUEUE] = $this->time[self::QUEUE] + Timer::getResolution();
                break;
            case self::MACHINE :
                $this->time[self::MACHINE] = $this->time[self::MACHINE] + Timer::getResolution();
                break;
        }
    }
    function end() {
        $this->end = true;
    }

}

class Machine {

    public $element;
    public $timer;
    public $endtime;

    function __construct(Timer $timer) {
        $this->timer = $timer;
    }

    public function setElement(Element $element) {
        $this->element = $element;
    }

    public function getElement() {
        return $this->element;
    }

    public function update() {
        if (($this->element instanceof Element)) {
            $this->element->update(Element::MACHINE);
            $this->timer->nextCycle();
        }
    }

    public function busy($a) {
        if (($this->element instanceof Element)) {
            if (($this->element->getTime('exec') == round($this->element->getTime(Element::MACHINE), 2))) {
               
                 Statistics::addEvent($a,'<font color=red>elemnt nr. ' . $this->element->id.' Skonczyl prace</font>');
                 $this->element->end();
                 $this->element = null;
                 
                 return true;
                 
            }
            else {
                
                return false;
            }
        }
        else {
            
            return true;
        }
            
    }
}

class Timer {

    static $resolution;
    private $clock = 0;

    static function setResolution($res = 1) {
        self::$resolution = $res;
    }

    static function getResolution() {
        return self::$resolution;
    }

    function setClock($clock) {
        $this->clock = $clock;
    }

    function nextCycle() {
        $this->clock = round($this->clock + self::$resolution, 2);
    }

    function getTime() {
        return $this->clock;
    }

}

class Statistics {

    static private $events = array();

    static function addEvent($timestamp = 0, $message = '') {
        self::$events["$timestamp"][] = $message;
    }

    static function showEvents() {
        print '<table border="1">               <tr> <th>czas zdarzenie</th>
                <th>Zdarzenie</th></tr>';
        foreach (self::$events as $key => $value) {
            print '<tr><td>' . $key . '</td><td>';
            foreach ($value as $value2) {
                print $value2 . '<br/>';
            }
            print '</tr>';
        }
        print '</table>';
    }
    
    static function generate($elements,$machines,$queue,$timer) {
        $a = $b = 0;
        foreach($elements as $el) {
            $a += $el->getTime(Element::QUEUE);
            $b += $el->getTime(Element::QUEUE) + $el->getTime(Element::MACHINE);
        }
        print 'średni czas oczekiwania elementu w kolejce : '. round($a/count($elements),2).'<br>'; 
        print 'średni czas przebywania w systemie : '. round($b/count($elements),2).'<br>'; 
        foreach($machines as $num => $ma) {
            print 'obciążenie maszyny nr '.$num.' wynosi: '.round($ma->timer->getTime()/$timer*100,2) .'%<br>';
        }
        $i=0;
        $j=0;
        $b = $queue->getStatus();
        array_pop($b);
        foreach($b as $key=> $st) {
            //print $key .' -- '.$st.'<br> ';
            if($st == 0)
            $i++;
            if($st == 1)
            $j++;
        }
        print 'Kolejka była pusta przez : '.$i.', W kolejce byl 1 element przez : '.$j.'<br>';
    }

}

class Template {

    static public function postForm($number = 15) {
        print '<form action="" method="post">';
        print '<table border="1">';
                print '<tr>' .
                '<th>Roździelczość zegara</th>' .
                '<th>ilość elementów</th>' .
                '<th>ilość maszyn</th>' .
                '</tr>';


        print '<tr>';
        print '<td><input name="resolution" value="'.$_REQUEST['resolution'].'"/></td>';
        print '<td><input name="numbers" value="'.$_REQUEST['numbers'].'"/></td>';
        print '<td><input name="machines" value="'.$_REQUEST['machines'].'"/></td>';
        print '</tr>';
        print '<tr>' .
                '<th>Numer zdarzenia</th>' .
                '<th>czas przybycia</th>' .
                '<th>czas wykonania</th>' .
                '</tr>';

        for ($i = 1; $i <= $number; $i++) {
            print '<tr>';
            print '<td>' . $i . '</td>';
            print '<td><input name="req[' . $i . '][arrival]" value="' . $_POST['req'][$i]['arrival'] . '"/></td>';
            print '<td><input name="req[' . $i . '][execution]" value="' . $_POST['req'][$i]['execution'] . '" /></td>';
            print '</tr>';
        }

        print '</table> <input type="submit"></form>';
        
    }

    static public function getForm($number = 15) {
        print '<form action="spp.php" method="post">';
        print '<table>';
        print '<tr>' .
                '<th>Roździelczość zegara</th>' .
                '<th>ilość elementów</th>' .
                '<th>ilość maszyn</th>' .
                '</tr>';


        print '<tr>';
        print '<td><input name="resolution"/></td>';
        print '<td><input name="numbers"/></td>';
        print '<td><input name="machines"/></td>';
        print '</tr>';

        print '</table> <input type="submit"></form>';
        
    }

}

?>
