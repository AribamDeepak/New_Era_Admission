<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	
    }

	public function index()
	{  
		$this->load->view('extraedge/instruction');
		// $this->load->view('extraedge/noAdmissionDeclare');
	}

	public function instruction()
	{  
		$this->load->view('extraedge/instruction');
	}

}
