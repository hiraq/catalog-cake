<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize','Utility');

class ProductsController extends AppController {
    
    public $uses = array('CatalogProduct');    
    
    public function beforeFilter() {
        
        parent::beforeFilter();
        $this->Auth->allow(array('view'));
        $this->Components->load('Paginator');
        $this->helpers[] = 'Paginator';
        
        /*
         * pagination rules
         */
        $this->paginate = array(
             'CatalogProduct' => array(
                'limit' => 10,
                'order' => array('CatalogProduct.product_created' => 'desc')
            )
        );
        
    }
    
    public function manager_index() {
        
        $products = $this->paginate('CatalogProduct');
        
        $this->set('title_for_layout',__('Products Management'));
        $this->set(compact('products'));
        
    }
    
    public function manager_add() {
        
        if ($this->request->is('post')) {
            
            //sanitize user input
            $this->request->data = Sanitize::clean($this->request->data);
            
            $this->CatalogProduct->create();
            $save = $this->CatalogProduct->save($this->request->data);
            
            if ($save) {
                $this->Session->setFlash(__('Product telah ditambah'),'default',array(),'success');
            } else {
                $this->Session->setFlash(__('Product gagal ditambah'),'default',array(),'failure');
            }
            
        }
        
        $this->set('title_for_layout',__('Products Management - Create New'));
        
    }
    
    public function manager_edit($id) {
        
        $id = intval($id);
        $product = $this->CatalogProduct->find('first',array(
            'conditions' => array('CatalogProduct.id' => $id)
        ));
        
        /*
         * form submitted
         */
        if ($this->request->is('post')) {
            
            //sanitize user input
            $this->request->data = Sanitize::clean($this->request->data);                       
            
            $this->CatalogProduct->id = $id;
            $save = $this->CatalogProduct->save($this->request->data);
            
            if ($save) {
                $this->Session->setFlash(__('Product telah diupdate'),'default',array(),'success');
            } else {
                $this->Session->setFlash(__('Product gagal diupdate'),'default',array(),'failure');
            }
            
            //disable cache
            $this->CatalogProduct->cacheQueries = false;
            
            /*
             * reset new data
             */
            $product = $this->CatalogProduct->find('first',array(
                'conditions' => array('CatalogProduct.id' => $id)
            ));

        }
        
        $this->set('title_for_layout',__('Edit Product'));
        $this->set(compact('product','id'));
        
    }
    
    public function manager_delete($id) {
        
        //no auto rendering view
        $this->autoRender = false;
        
        /*
         * only if requested data is POST
         */
        if ($this->request->is('post')) {
            
            $id = intval($id);
            $this->CatalogProduct->delete($id,false);
            
            $this->Session->setFlash(__('Product telah dihapus'),'default',array(),'success');
            $this->redirect($this->referer());
            
        }
        
    }
    
    public function view($id) {
        
        $id = intval($id);
        $data = $this->CatalogProduct->find('first',array(
            'conditions' => array('CatalogProduct.id' => $id)
        ));
        
        if (empty($data)) {
            $this->redirect(array('controller' => 'pages','action' => 'home'),302,true);
        }
        
        $this->set('title_for_layout',$data['CatalogProduct']['product_name']);
        $this->set(compact('data'));
        
    }
    
}