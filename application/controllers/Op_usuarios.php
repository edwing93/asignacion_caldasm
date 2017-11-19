<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Op_usuarios extends CI_Controller {

	var $user;

	function __construct() {
        	parent::__construct();
    	}

	public function index() {

		if($this->session->userdata('Nit')){
			$this->load->model('Usuarios');
			$filtro['cedula']= $this->Usuarios->filtro($this->session->userdata('Nit'));
			$this->load->view('usuario/menu',$filtro);
		}else {

		redirect(site_url());
	}


}

	public function login(){
		$this->load->view('login/login_usuario');
	}


	public function validar() {
		if ( ! $this->input->post('Nit') && ! $this->input->post('password'))
		{
			redirect('Op_usuarios/login');
		} else {
			$cedula = $this->input->post('Nit');
			$pass = $this->input->post('pass');

			if($this->Login_usuarios->login($cedula, $pass)) {

				$this->session->set_userdata('Nit',$cedula);
				redirect('Op_usuarios');

			}
			else{
				$this->load->view('login/error');
			}
		}
	}


	public function agendar_view(){
		$this->load->view('cliente/agendar');
	}
////////////////////////////   CITAS  //////////////////////////////////////

	 public function gestion_citas(){
		 $this->load->view('usuario/gestion_citas');
	 }

	 public function proximas(){
		 $hoy = date("ymd");
		 $dato["proximas"]=$this->Cita->listar_proximas($hoy);
		 $this->load->view('usuario/proximas_citas',$dato);
	 }
	 public function historico(){
		 $dato["todas"]=$this->Cita->listar();
		 $this->load->view('usuario/historico',$dato);
	 }


	 ////////////////////////////// Tecnicos  /////////////////////
	 public function ver_tecnicos(){
		 $dato["tecnicos"]=$this->Operarios->listar();
		 $this->load->view('usuario/tecnicos_view',$dato);
	 }

	 public function agregar_tecnico(){
		 $cedula=$this->input->post('cedula');
		 $nombre=$this->input->post('nombre');
		 $combo= array('Cedula'=>$cedula, 'Nombres'=>$nombre, 'Estado'=> "Activo");
		 $this->Operarios->agregar($combo);
		 redirect('Op_usuarios/ver_tecnicos');

	 }

	 ///////////////////////// CONSULTAS /////////////////////
	 public function consultas(){
		 $this->load->view('usuario/consultas');
	 }

	 public function ver_tercero(){
		 $this->load->view('usuario/consulta_tercero');
	 }

}
