<?php
include("Hw_Controller.php");

/**
 * Class Content
 *
 * @property Content_model $content_model
 */
class Content extends Hw_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
    }

    public function index()
    {
        $contents = $this->content_model->getAll();
        $this->parser->parse('contents/list.php', array("page_title" => "Contents list", 'contents' => $contents));
    }

    public function add()
    {
        $data = $this->input->post('content');
        if(null != $data)
        {
            $res = $this->content_model->insert($data);
        }
        $this->load->helper('form');
        $form = $this->_form();
        $this->parser->parse('classes/new.php', array("page_title" => "New content", 'form' => $form));
    }

    protected function _form()
    {

        $formArray[]  = form_open();
        $this->content_model->fieldsInformations();
        $formArray = array_merge($formArray, $this->content_model->formFromRecord(array()));
        $formArray[] = form_close();

        $form = "";
        foreach ($formArray as $formLine)
        {
            $form .= $formLine."\n";
        }
        return $form;
    }
}

