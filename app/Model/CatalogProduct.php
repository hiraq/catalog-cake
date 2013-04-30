<?php

App::uses('AppModel','Model');

class CatalogProduct extends AppModel {
    
    public $name = 'CatalogProduct';
    public $useTable = 'products';
    
    public function beforeValidate($options = array()) {                
        
        parent::beforeValidate($options);
        
        /*
         * validate rules
         */
        $this->validate = array(
            'product_name' => array(
                'empty' => array(
                     'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('This field required'),
                    'last' => true
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => __('This product name has already taken')
                )
            ),
            'product_desc' => array(
                'rule' => 'notEmpty',
                'allowEmpty' => false,
                'message' => __('This field required')
            ),
            'product_price' => array(
                'empty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('This field required'),
                    'last' => true
                ),
                'number' => array(
                    'rule' => 'numeric',                    
                    'message' => __('Must contain valid numeric')
                ),
                'comparison' => array(
                    'rule' => array('comparison','>',0),                    
                    'message' => __('Price must greater than 0')
                )
            ),
            'product_main_image' => array(                
                'type' => array(
                    'rule' => array('extension',array('gif','png','jpg','jpeg')),
                    'message' => __('Your file extension not allowed')
                ),
                'upload' => array(
                    'rule' => array('validateUpload'),
                    'message' => __('Error uploading file')
                )
            )
        );
        
        if ($this->data['CatalogProduct']['product_main_image']['error'] == 4) {
            $this->validator()->remove('product_main_image');
        }
        
    }        
    
    public function beforeSave($options = array()) {
        
        parent::beforeSave($options);
        
        /*
         * only if has uploaded image
         */
        if (isset($this->data['CatalogProduct']['product_main_image']['name']) 
                && $this->data['CatalogProduct']['product_main_image']['error'] == 0) {
          
            $filename = $this->data['CatalogProduct']['product_main_image']['name'];        
            $this->data['CatalogProduct']['product_main_image'] = $filename;            
            
        } else {
            unset($this->data['CatalogProduct']['product_main_image']);
        }        
        
        $this->data['CatalogProduct']['product_created'] = date('c');        
        return true;
    }
    
    public function validateUpload($check) {
        
        if (isset($check['product_main_image']) && $check['product_main_image']['error'] == 0) {
            
            $tmpFile = $check['product_main_image']['tmp_name'];
            $fileName = $check['product_main_image']['name'];
            
            if (is_uploaded_file($tmpFile)) {
                return move_uploaded_file($tmpFile,WWW_ROOT.'img'.DS.'products'.DS.$fileName);
            }
            
            return false;
            
        }
        
        return false;
        
    }
    
}