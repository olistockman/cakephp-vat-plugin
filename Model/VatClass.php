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
}

