<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	var $user;

	function __construct() {
        	parent::__construct();
    	}

	public function index() {
		if($this->session->userdata('Nit')){
			$this->load->view('Cliente/menu');
		}
		$this->load->view('login/login_view');
	}

	// INICIO FUNCIONES DE USUARIOS

	public function validar() {
		if ( ! $this->input->post('Nit') && ! $this->input->post('password'))
		{
			redirect('Login/index');
		} else {
			$username = $this->input->post('Nit');
			$password = $this->input->post('password');

			if($this->Login_terceros->login($username, $password)) {

				$this->session->set_userdata('Nit',$username);
				redirect('Op_Cliente');

			}
			else{
				$this->load->view('login/error');
				
			}
		}
}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
}
