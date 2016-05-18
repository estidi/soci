<?php

App::uses('AppController', 'Controller');

/**
 * Pages Controller
 *
 * @property Page $Page
 */
class PagesController extends AppController {
    public $helpers = array('Html','Form','Text');
        public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Page->exists($id)) {
            throw new NotFoundException(__('Invalid page'));
        }
        $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
        $this->set('page', $this->Page->find('first', $options));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Page->recursive = 0;
        $this->set('pages', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Page->exists($id)) {
            throw new NotFoundException(__('Invalid page'));
        }
        $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
        $this->set('page', $this->Page->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Page->create();
            if ($this->Page->save($this->request->data)) {
                $this->Session->setFlash(__('The page has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Page->exists($id)) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Page->save($this->request->data)) {
                $this->Session->setFlash(__('The page has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
            $this->request->data = $this->Page->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Page->delete()) {
            $this->Session->setFlash(__('Page deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Page was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
