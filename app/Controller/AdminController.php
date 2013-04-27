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
        
    }
    
}