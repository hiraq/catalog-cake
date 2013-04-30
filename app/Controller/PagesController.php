<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('CatalogProduct');
    
    public function beforeFilter() {
        
        parent::beforeFilter();
        $this->Auth->allow();
        $this->Components->load('Paginator');
        $this->helpers[] = 'Paginator';
        $this->helpers[] = 'Number';
        
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
    
    public function index() {
        $this->redirect(array('action' => 'home'));
    }

    public function home() {
        
        $products = $this->paginate('CatalogProduct');
        
        $this->set('title_for_layout',__('Catalog Online'));
        $this->set(compact('products'));
        
    }

}
