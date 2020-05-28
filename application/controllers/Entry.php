<?php
/**
 * Class Entry
 *
 * @property content_model $content_model
 */


include("Hw_Controller.php");

class Entry extends Hw_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
        $this->load->model('entry_model');
    }

    public function add()
    {
        //--- Getting all the contents
        $contents = $this->content_model->getAll();

        $this->load->helper('form');
        $form = $this->_form();
        $this->parser->parse('entries/new.php', array("page_title" => "New entry", 'form' => $form));
    }

    protected function _form()
    {

        $formArray[]  = form_open();
        $this->entry_model->fieldsInformations();
        $formArray = array_merge($formArray, $this->entry_model->formFromRecord(array()));
        $formArray[] = form_close();

        $form = "";
        foreach ($formArray as $formLine)
        {
            $form .= $formLine."\n";
        }
        return $form;
    }
}