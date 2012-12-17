<?php
/**
 * Vat Classes Controller
 * 
 * @property VatClass $VatClass
 */

class VatClassesController extends VatAppController {
    
    /**
     * Helpers
     * 
     * @var array
     */
    
    public $helpers = array('Html', 'Form', 'Vat.Geography');
    
    /**
     * Index Method
     * 
     * @return void
     */    
    
    public function index() {
        $this->VatClass->recursive = 0;
        $this->set('VatClasses', $this->paginate());
    }
    
    
    public function add() {
        if ($this->request->is('post')) {
            $this->VatClass->create();
            pr($this->request->data);
            
            
            if ($this->VatClass->save($this->request->data)) {
                $this->Session->setFlash('Class Saved');
            } else {
                pr($this->VatClass->validationErrors);
                pr($this->VatClass->invalidFields);
                $this->Session->setFlash('Class failed to Save');
            }
        }
    }
    
    public function edit($id = null) {
        $this->VatClass->id = $id;
        
        if (!$this->VatClass->exists()) {
            throw new NotFoundException(__('Invalid Vat Class'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->VatClass->save($this->request->data, false)) {
                $this->Session->setFlash('Class Saved');
            } else {
                pr($this->VatClass->validationErrors);
                pr($this->VatClass->invalidFields);
                $this->Session->setFlash('Class failed to Save');
            }
        } else {
                $this->request->data = $this->VatClass->read(null, $id);
        }
    }
    
}

?>
