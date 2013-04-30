<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize','Utility');

class UsersController extends AppController {
    
    public $uses = array('CatalogUser');
    
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function index() {
        //pass
    }
    
    public function manager_change_password() {
        
        if ($this->request->is('post')) {
            
            //sanitize user input
            Sanitize::clean($this->request->data);
                        
            $update = $this->CatalogUser->updatePassword($this->request->data);
            
            if ($update) {                
                $this->Session->setFlash(__('Password sukses diupdate'),'default',array(),'success');
            } else  {                
                $this->Session->setFlash(__('Password gagal diupdate'),'default',array(),'failure');
            }
            
        }
        
        $this->set('title_for_layout',__('Catalog Engine - Update Admin Password'));
    }
    
    public function manager_logout() {
        $this->redirect($this->Auth->logout());
    }
    
}