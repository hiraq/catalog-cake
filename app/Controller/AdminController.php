<?php

App::uses('AppController','Controller');

class AdminController extends AppController {
    
    public $uses = array('CatalogUser');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('manager_login','manager_logout');
    }
    
    public function manager_index() {
        $this->redirect(array('action' => 'login','manager' => true));
    }
    
    public function manager_login() {
        
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            } else{
                $this->set('login_error',true);
                $this->Session->setFlash(__('Username atau password tidak valid'),'default',array(),'auth');
            }
        }
        
        $this->set('title_for_layout',__('Administrator Login'));
        
    }
    
    public function manager_dashboard() {
        $this->set('title_for_layout',__('Catalog Engine - Dashboard'));
    }        
    
}