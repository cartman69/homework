<?php
include("Hw_Model.php");

class Class_model extends Hw_Model
{

    /**
     * @var School_model
     */
    protected $school_model;

    public function __construct()
    {
        $this->tableNameNoprefix = 'class';

        $CI =& get_instance();
        //$CI->load->model('school_model');

        parent::__construct();
    }

    public function formFromRecord($record)
    {
        $form = parent::formFromRecord($record);
        unset ($form['id_label']);
        $form['id'] = form_hidden(
            "id",
            isset($record["id"])?$record["id"]:''
        );
/*
        $form['ADDRESS'] = form_textarea(
            array(
                "name" => "ADDRESS",
                "id" => "ADDRESS",
                "value" => isset($record["ADDRESS"])?$record["ADDRESS"]:'',
                "maxlength" => $this->fieldsInformations["ADDRESS"]->max_length,
                "class" => "form-control",
            ));
*/
        $form['submit'] = form_submit(array('value' => 'Submit'));

        return $form;
    }
}

