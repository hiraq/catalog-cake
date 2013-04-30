<?php

App::uses('AppModel','Model');

class CatalogUser extends AppModel {
    
    public $name = 'CatalogUser';
    public $useTable = 'users';                
    
    public function updatePassword($data) {
        
        //set data for validation
        $this->set($data);
        
        $this->validate = array(
            'password' => array(
                'empty' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => __('Please input your current password'),
                    'last' => true
                ),
                'validPassword' => array(
                    'rule' => array('validateCheckValidPassword',$data['CatalogUser']['password']),
                    'message' => __('Your password not valid.')
                )
            ),
            'password_new' => array(
                'empty' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => __('Please input your new password'),
                    'last' => true
                ),
                'equalConfirm' => array(
                    'rule' => array('validateCheckPasswordConfirm',$data['CatalogUser']['password_new_confirm']),
                    'message' => __('Your new password not match.')
                )
            ),
            'password_new_confirm' => array(
                 'empty' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => __('Please confirm your new password'),
                    'last' => true
                ),
                'equalConfirm' => array(
                    'rule' => array('validateCheckPasswordConfirm',$data['CatalogUser']['password_new']),
                    'message' => __('Your new password not match.')
                )
            )
        );     
        
        $this->id = $this->getUserId();
        return $this->save(array(
            'CatalogUser' => array(
                'password' => AuthComponent::password($data['CatalogUser']['password_new'])
            )
        ));
        
    }        
    
    public function getUserId() {
        
        $data = $this->find('first',array(
             'conditions' => array(
                'CatalogUser.username' => 'manager'
            ),
            'fields' => array('CatalogUser.id')
        ));
        
        return $data['CatalogUser']['id'];
        
    }
    
    public function validateCheckPasswordConfirm($check,$confirm) {
        $keys = array_keys($check);
        return $check[$keys[0]] == $confirm;
    }
    
    public function validateCheckValidPassword($check,$real) {                
        
        $data = $this->find('first',array(
            'conditions' => array(
                'CatalogUser.username' => 'manager'
            ),
            'fields' => array('CatalogUser.password')
        ));
        
        if (!empty($data)) {            
            $password = AuthComponent::password($real);                  
            return trim($data['CatalogUser']['password']) == $password ? true : false;            
        } else {
            return false;
        }                
        
    }
    
}