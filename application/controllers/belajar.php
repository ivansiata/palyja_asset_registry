<?php

class Belajar extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){	
		$this->load->view('v_web');

	}

}


?>