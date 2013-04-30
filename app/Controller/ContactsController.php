<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize','Utility');

class ContactsController  extends AppController {
    
    public $uses = array('CatalogContact');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index'));
    }
    
    public function index() {
        $data = $this->CatalogContact->find('first');
        $this->set('title_for_layout',__('Contact Us'));
        $this->set(compact('data')); 
    }
    
    public function manager_index() {
        
        $data = $this->CatalogContact->find('first');
        if (empty($data)) {
            $this->redirect(array('action' => 'add','manager' => true));
        } else {            
            
            /*
             * form submitted
             */
            if ($this->request->is('post')) {
                
                //update by sanitized data
                $update = $this->CatalogContact->save(Sanitize::clean($this->request->data));
                
                /*
                 * set notif
                 */
                if ($update) {
                    $this->Session->setFlash(__('Contact updated'),'default',array(),'success');
                } else {
                    $this->Session->setFlash(__('Contact failed to updated'),'default',array(),'failure');
                }
                
                //assign new data
                $data = $this->request->data;                
                
            }
            
            $this->set(compact('data')); 
            
        }
        
        $this->set('title_for_layout',__('Edit Contact'));
        
    }
    
    public function manager_add() {
        
        /*
         * form submitted
         */
        if ($this->request->is('post')) {                        
            
            /*
             * create new record
             */
            $this->CatalogContact->create();
            $save = $this->CatalogContact->save(Sanitize::clean($this->request->data));
            
            /*
             * set notif
             */
            if ($save) {
                $this->Session->setFlash(__('Contact added'),'default',array(),'success');
            } else {
                $this->Session->setFlash(__('Contact failed to add'),'default',array(),'failure');
            }
            
        }
        
        $this->set('title_for_layout',__('Add New Contact'));
        
    }
    
}