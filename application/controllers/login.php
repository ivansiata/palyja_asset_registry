<?php

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper(array('form', 'url', 'download'));
	}

	function index(){
		$this->load->view('v_login');
		$this->load->view('v_footer');
	}

	function login_action(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
				'username' => $username,
				'password' => md5($password)
			);

		$check = $this->m_login->login_check("user", $where);
		$rows = $check->num_rows();


		if($rows > 0){
			$check = $check->row_Array();
			$data_session = array(
					'username' => $username,
					'status' => "login",
					'role' => $check['role']
				);
			$this->session->set_userdata($data_session);

			if($this->session->userdata('role') == "manager"){
				redirect("crud/");
			}else{
				redirect('crud/home');
			}

		}else{
			$data_session = array(
					'username' => $username,
					'status' => "login",
					'role' => "admin"
				);
			$this->session->set_userdata($data_session);
			// header("refresh:2; url=".base_url()."/login");
			// echo "<center><h2 style='position:fixed; top:40%; left:50%; transform: translate(-50%, -50%);'>Incorrect username or password!</h2></center>";
			redirect('crud/home');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login/');
	}


}

?>