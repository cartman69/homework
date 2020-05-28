<?php

class Hw_Controller extends \CI_Controller
{
    protected $debug = true;

    /**
     * @var \Project_model $project_model
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('parser');
        $this->load->helper('form');

        if($this->debug)
        {
            $this->output->enable_profiler(TRUE);
        }
    }

    public function dump($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

