<?php

class VatRate extends VatAppModel {

/**
 * Validation
 * 
 * @var array
 */

        public $validate = array(
            'vat_class_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                    'message' => 'Cannot continue without a class ID',
                    'required' => true,
                    'allowEmpty' => false,
                ),
             ),
             'rate' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                    'message' => 'A number is required',
                    'required' => true,
                    'allowEmpty' => false
                ),
                'between' => array(
                    'rule' => array('between', 0, 100),
                    'message' => 'Must be a valid percentage',

                )
             ),
             'start_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => 'A date is required',
                    'required' => true,
                    'allowEmpty' => false
                ),
             ),
             'end_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => 'A date is required',
                    'required' => false,
                    'allowEmpty' => true
                ),
             ),
         );  
 
/**
  * BelongsTo Associations
  * 
  * @var array
  */       
        public $belongsTo = array(
            'VatClass' => array(
                'className' => 'Vat.VatClass',
                'foreignKey' => 'vat_class_id',
            )
        );    
 
  /**
  * Class by Country and Class Code
  * Find all clases for a country
  * 
  * @param string $country_code
  * @param string $class_code
  * @param date $date (in MySQL format Y-m-d) 
  * @return array
  */       
        public function rateByCountryAndClass($country_code = null, $class_code = null, $date = '1901-01-01') {
        
            if($country_code && $class_code && $date > '1901-01-01') {
                
                $vat_class = $this->VatClass->classByCountryAndCode($country_code, $class_code);
                
                if ($vat_class) {
                    $rate = $this->find('first', array(
                                'fields' => array('rate'),
                                'conditions' => array(
                                                'vat_class_id' => $vat_class,
                                                'start_date <' => $date,
                                                ),
                                'order' => array(
                                                'start_date' => 'desc',
                                                ),
                                'recursive' => -1,
                    ));
                    
                    return $rate['VatRate']['rate'];
                    
                } else {
                    return false;
                }
                
            } else {
                return false;
            }
            
        }

}

