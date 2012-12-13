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
            'vatClass' => array(
                'className' => 'vatClass',
                'foreignKey' => 'vat_class_id',
            )
        );    
}

