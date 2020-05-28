<?php
include("Hw_Model.php");

class School_model extends Hw_Model
{
    
    public function __construct()
    {
        $this->tableNameNoprefix = 'schools';
        parent::__construct();
    }
    
    public function formFromRecord($record)
    {
        $form = parent::formFromRecord($record);
        $form['address'] = form_textarea(
            array(
                "name" => "{$this->tableNameNoprefix}[address]",
                "id" => "address",
                "value" => isset($record["address"])?$record["address"]:'',
                "maxlength" => $this->fieldsInformations["address"]->max_length,
                "class" => "form-control",
            ));
        
        
        return $form;   
    }
}

