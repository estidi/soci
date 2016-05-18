<?php

App::uses('AppController', 'Controller');

/**
 * Menus Controller
 *
 * @property Menu $Menu
 */
class MenusController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view','topMenu');
    }
    public function view($id=false) {        
        if($id == false) {
            $id = $this->Menu->find('first');
            $id = $id['Menu']['id'];
        }
        $idp = $id;

        $tmpid = $this->Menu->getParentNode($id);
        if(isset($tmpid['Menu'])) {
            $id = $tmpid['Menu']['id'];
        }
		
        $bottomMenu = $this->Menu->children($id,true);
        $page = $this->Menu->findById($idp);
        
        $this->set('title_for_layout','SocialMediate.pl - '.$page['Page']['title']);
        $this->set('page',$page);
        $this->set('bottomMenu',$bottomMenu);
        
    }

    public function topMenu() {
        if (empty($this->request->params['requested'])) {
            throw new ForbiddenException();
        }
        return $this->Menu->find('list', array(
                    'conditions' => array('Menu.parent_id' => null), //array of conditions
                    'recursive' => 1,
                    'order' => 'Menu.lft')
        );
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->set('treelist', $this->Menu->find('threaded', array(
                    'recursive' => 0,
                    'fields' => array('Menu.id', 'Menu.name', 'Menu.parent_id', 'Page.id', 'Page.title'),
                    'order' => array('Menu.lft')
        )));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
        $this->set('menu', $this->Menu->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Menu->create();
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
            }
        }
        $parentMenus = $this->Menu->find('list', array(
            'conditions' => array('Menu.parent_id' => null), //array of conditions
            'recursive' => 1));
        $pages = $this->Menu->Page->find('list');
//debug($parentMenus);die;
        $this->set(compact('parentMenus', 'pages'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException(__('Invalid menu'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
// debug($this->request->data);die;
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('The menu has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
            $this->request->data = $this->Menu->find('first', $options);
        }
        $parentMenus = $this->Menu->find('list', array(
            'conditions' => array('Menu.parent_id' => null), //array of conditions
            'recursive' => 0));
        $pages = $this->Menu->Page->find('list');
//debug($parentMenus);die;
        $this->set(compact('parentMenus', 'pages', 'id'));
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
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
            throw new NotFoundException(__('Invalid menu'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Menu->delete()) {
            $this->Session->setFlash(__('Menu deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Menu was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_movedown($id = null, $delta = 1) {
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0) {
            $this->Menu->moveDown($this->Menu->id, abs($delta));
        } else {
            $this->Session->setFlash('Please provide the number of positions the field should be moved down.');
        }

        $this->redirect(array('action' => 'index'), null, true);
    }

    public function admin_moveup($id = null, $delta = 1) {
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0) {
            $this->Menu->moveUp($this->Menu->id, abs($delta));
        } else {
            $this->Session->setFlash('Please provide a number of positions the category should be moved up.');
        }

        $this->redirect(array('action' => 'index'), null, true);
    }

}
