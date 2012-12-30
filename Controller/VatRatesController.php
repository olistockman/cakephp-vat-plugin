<?php
/**
 * Vat Rates Controller
 * 
 * @property VatRate $VatRate
 */

class VatRatesController extends VatAppController {
    
    /**
     * Helpers
     * 
     * @var array
     */
    
    public $helpers = array('Html', 'Form');
    
    /**
     * Index Method
     * 
     * @return void
     */    
    
    public function index() {
        $this->VatRate->recursive = 0;
        $this->set('VatRates', $this->paginate());
    }
    
    
    public function add($country_code) {

        if (!$country_code) {
            throw new notFoundException(__('Invalid Country Code'));
        }
        
        $classes = $this->VatRate->VatClass->classesByCountry($country_code);

        if ($this->request->is('post')) {
            if ($this->VatRate->saveAll($this->request->data['VatRate'])) {
                $this->Session->setFlash('Rates Saved');
            } else {
                $this->Session->setFlash('Rates failed to Save');
            }
        }
        
        $this->set(compact('classes'));
        
    }
    
    public function edit($id = null) {
        $this->VatRate->id = $id;
        
        if (!$this->VatRate->exists()) {
            throw new NotFoundException(__('Invalid Vat Rate'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->VatRate->saveAll($this->request->data)) {
                $this->Session->setFlash('Rate Saved');
            } else {
                $this->Session->setFlash('Rate failed to Save');
            }
        } else {
                $this->request->data = $this->VatRate->read(null, $id);
        }
    }
    
}

?>
