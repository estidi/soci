<?php

App::uses('AppController', 'Controller');

/**
 * Sideboxes Controller
 *
 * @property Sidebox $Sidebox
 */
class SideboxesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }
    public function view() {
        if (empty($this->request->params['requested'])) {
            throw new ForbiddenException();
        }
        return $this->Sidebox->find('all');
        
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Sidebox->recursive = 0;
        $this->set('sideboxes', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Sidebox->exists($id)) {
            throw new NotFoundException(__('Invalid sidebox'));
        }
        $options = array('conditions' => array('Sidebox.' . $this->Sidebox->primaryKey => $id));
        $this->set('sidebox', $this->Sidebox->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Sidebox->create();
            if ($this->Sidebox->save($this->request->data)) {
                $this->Session->setFlash(__('The sidebox has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sidebox could not be saved. Please, try again.'));
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
        if (!$this->Sidebox->exists($id)) {
            throw new NotFoundException(__('Invalid sidebox'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Sidebox->save($this->request->data)) {
                $this->Session->setFlash(__('The sidebox has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sidebox could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Sidebox.' . $this->Sidebox->primaryKey => $id));
            $this->request->data = $this->Sidebox->find('first', $options);
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
        $this->Sidebox->id = $id;
        if (!$this->Sidebox->exists()) {
            throw new NotFoundException(__('Invalid sidebox'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Sidebox->delete()) {
            $this->Session->setFlash(__('Sidebox deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Sidebox was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
