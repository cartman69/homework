<?php
include("Hw_Controller.php");
//use application\models\Project_model;

class Classe extends Hw_Controller
{
    /**
     * @var \Class_model $school_model
     */
    var $class_model;



    public function __construct()
    {
        parent::__construct();
        $this->load->model('class_model');
    }

    public function index()
    {
        $classes = $this->class_model->getAll();
        $this->parser->parse('classes/list.php', array("page_title" => "Classes list", 'classes' => $classes));
    }

    public function add()
    {
        $data = $this->input->post('class');
        if(null != $data)
        {
            $res = $this->class_model->insert($data);
        }
        $this->load->helper('form');
        $form = $this->_form();
        $this->parser->parse('classes/new.php', array("page_title" => "New class", 'form' => $form));
    }

    protected function _form()
    {

        $formArray[]  = form_open();
        $this->class_model->fieldsInformations();
        $formArray = array_merge($formArray, $this->class_model->formFromRecord(array()));
        $formArray[] = form_close();

        $form = "";
        foreach ($formArray as $formLine)
        {
            $form .= $formLine."\n";
        }
        return $form;
    }
}

