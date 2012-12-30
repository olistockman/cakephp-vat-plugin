<?php

class VatClass extends VatAppModel {

/**
 * Validation
 * 
 * @var array
 */

        public $validate = array(
            'name' => array(
                'required' => array(
                    'rule' => array('alphaNumeric'),
                    'message' => 'Cannot continue without a name',
                    'required' => true,
                    'allowEmpty' => false,
                ),
             ),
             'code' => array(
                'required' => array(
                    'rule' => array('alphaNumeric'),
                    'message' => 'A two letter/digit code is required',
                    'required' => true,
                    'allowEmpty' => false
                )
             ),
             'country_code' => array(
                'required' => array(
                    'rule' => array('alphaNumeric'),
                    'message' => 'A two letter/digit code is required',
                    'required' => true,
                    'allowEmpty' => false
                )
             ),
             'area' => array(
                'alpha' => array(
                    'rule' => array('alphaNumeric'),
                    'message' => 'Enter State/County information',
                    'required' => false,
                    'allowEmpty' => true
                )
             ),
        );    

 /**
  * HasMany Associations
  * 
  * @var array
  */       
        public $hasMany = array(
            'VatRate' => array(
                'className' => 'Vat.VatRate',
                'foreignKey' => 'vat_class_id',
            )
        );
        
 /**
  * Classes By Country
  * Find all clases for a country
  * 
  * @param string $country_code
  * @return array
  */       
        public function classesByCountry($country_code) {
        
            if($country_code) {
                return $this->findAllByCountryCode($country_code, array('id', 'name'), array(), null, null, -1);
            } else {
                return false;
            }
            
        }

  /**
  * Class by Country and Class Code
  * Find all clases for a country
  * 
  * @param string $country_code
  * @param string $class_code
  * @return array
  */       
        public function classByCountryAndCode($country_code, $class_code) {
        
            if($country_code && $class_code) {
                
                $id = $this->findByCountryCodeAndCode($country_code, $class_code, array('id'));
                
                if ($id) {
                    return $id['VatClass']['id'];
                } else {
                    return false;
                }                   
                
            } else {
                return false;
            }
            
        }
}

