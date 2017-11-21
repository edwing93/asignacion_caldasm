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

	 public function pendientes(){
		 $dato["proximas"]=$this->Cita->por_confirmar();
		 $dato["tecnicos"]=$this->Usuarios->tecnicos();
		 $this->load->view('usuario/por_confirmar',$dato);
	 }
	 public function historico(){
		 $dato["todas"]=$this->Cita->listar();
		 $this->load->view('usuario/historico',$dato);
	 }

	 public function confirmar_cita(){
		  $id=$this->input->post('id');
		  $tecnico=$this->input->post('operario');
			$this->Cita->confirmar($id,$tecnico);
			redirect('Op_usuarios/pendientes');
	 }

	 public function confirmadas(){
		 $dato["confirmadas"]=$this->Cita->citas_confirmadas();
		$this->load->view('usuario/confirmadas',$dato);
	 }

	 public function finalizar(){
		  $id=$this->input->post('id');
			$this->Cita->concluir_cita($id);
			redirect('Op_usuarios/confirmadas');
	 }

	 public function aplazar_cita(){
		 $id=$this->input->post('id');
		 $fecha=$this->input->post('fecini');
		 $this->Cita->aplazar($id,$fecha);
		 redirect('Op_usuarios/gestion_citas');
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

	public function cambiar_estado_tecnico(){
		$estado=$this->input->post("estado");
		$cedula=$this->input->post("cedula");

		if($estado=="Activo"){
			$combo=array('Estado'=>"Inactivo");
			$this->Operarios->cambiar_estado($cedula,$combo);
			redirect('Op_usuarios/ver_tecnicos');
		}else{
			$combo=array('Estado'=>'Activo');
			$this->Operarios->cambiar_estado($cedula,$combo);
			redirect('Op_usuarios/ver_tecnicos');
		}
	}

	 ///////////////////////// CONSULTAS /////////////////////
	 public function consultas(){
		 $this->load->view('usuario/consultas');
	 }

	 public function ver_tercero(){
		 $this->load->view('usuario/consulta_tercero');
	 }
	 public function ver_vehiculo(){
		 $this->load->view('usuario/consulta_vehiculo');
	 }
		//////////////////////////////////////////////  INFORMES //////////////////////////////////
	 public function informes_view(){
		 $this->load->view('usuario/informes_view');
	 }

	 public function info_canceladas(){
		 $fecha_inicial=$this->input->post('fecini');
		 $fecha_final=$this->input->post('fecfin');
		 $datos["resultado"]=$this->Cita->rango_citas_canceladas($fecha_final,$fecha_final);
		 $this->load->view('usuario/inf_citas_canceladas',$datos);
	 }

}
