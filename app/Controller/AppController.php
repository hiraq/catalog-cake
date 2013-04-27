<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    public $helpers = array('Html','Form','Session');
    public $components = array('Session','Auth');
    
    public function beforeFilter() {
        
        parent::beforeFilter();
        
        /*
         * auth settings
         */
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'CatalogUser'
            )            
        );
        
        $this->Auth->loginAction = array('controller' => 'admin','action' => 'login','manager' => true);
        $this->Auth->loginRedirect = array('controller' => 'admin','action' => 'dashboard','manager' => true);
        $this->Auth->logoutRedirect = array('controller' => 'admin','action' => 'login','manager' => true);
    }
    
}
