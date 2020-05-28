<?php
include("Hw_Controller.php");
//use application\models\Project_model;

class School extends Hw_Controller
{
    /**
     * @var \School_model $school_model
     */
    var $school_model;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('school_model');
    }
    
    public function index()
    {
        $schools = $this->school_model->getAll();
        $this->parser->parse('schools/list.php', array("page_title" => "Schools list", 'schools' => $schools));
    }
    
    public function add()
    {
		$data = $this->input->post('schools');
		if(null != $data)
		{
			$res = $this->school_model->insert($data);
			if($res)
			{
				redirect("/school/edit/{$this->school_model->getCurrentId()}");
			}
		}

		$this->load->helper('form');
        $form = $this->_form();
        $this->parser->parse('schools/new.php', array("page_title" => "New school", 'form' => $form));
    }

	public function edit($id)
	{
		$data = $this->input->post('schools');
		if(null != $data)
		{
			$res = $this->school_model->update($data);
		}else{
			$data = $this->school_model->find($id);
			$this->dump($data);
		}

		$this->load->helper('form');
		$form = $this->_form($data);
		$this->parser->parse('schools/new.php', array("page_title" => "Edit school", 'form' => $form));
	}

	protected function _form($data = null)
    {
    	if($data == null)
		{
			$data = array();
		}
        $formArray[]  = form_open();
        $this->school_model->fieldsInformations();
        $formArray = array_merge($formArray, $this->school_model->formFromRecord($data));
		$formArray[] = form_submit("school_submit", "Save");
        $formArray[] = form_close();
        
        $form = "";
        foreach ($formArray as $formLine)
        {
            $form .= $formLine."\n";
        }
        return $form;
    }
}

