<?php

App::uses('AppModel','Model');

class CatalogContact extends AppModel {
    
    public $name = 'CatalogContact';
    public $useTable = 'contacts';
    public $validate = array(
        'contact_content' => array(
            'rule' => 'notEmpty',
            'allowEmpty' => false,
            'required' => true            
        )
    );
    
}