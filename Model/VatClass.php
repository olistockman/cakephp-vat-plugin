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
        );    
    
}

