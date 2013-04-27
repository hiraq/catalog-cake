<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
    
    public $uses = array('CatalogUser');
    
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function index() {
        //pass
    }
    
    public function manager_change_password() {
        
    }
    
    public function manager_logout() {
        $this->redirect($this->Auth->logout());
    }
    
}