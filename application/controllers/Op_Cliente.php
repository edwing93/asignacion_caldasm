<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Op_Cliente extends CI_Controller {

	var $user;

	function __construct() {
        	parent::__construct();
			$this->load->model('cita');
    	}

	public function index() {
		$this->load->model('Terceros');
		$this->load->model('Cita');
		$filtro['nit']= $this->Terceros->filtro($this->session->userdata('Nit'));
		$this->load->helper('url');
		$this->load->view('cliente/menu',$filtro);
		
	}

////////////////////////////////////////////////////////   -----CLIENTES---------////////////////////////////////
	public function registrar() {

		$this->load->view('cliente/registrar');
	}
	// INICIO FUNCIONES DE USUARIOS

	public function validar(){

			$nit = $this->input->post('nit');
			$nombres = $this->input->post('nombres');
			$razon_social = $this->input->post('razon_social');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');
			$direccion = $this->input->post('direccion');
			$telefono1=$this->input->post('telefono1');
			$telefono2=$this->input->post('telefono2');
			$correo=$this->input->post('correo');
			$autoriza_datoss=$this->input->post('autoriza_datos');
			$pass = $this->input->post('contrasena');
			$dat= array(
		'Nit'=>$nit,
		'Nombres'=>$nombres,
		'Razon_social'=>$razon_social,
		'Fecha_nacimiento'=>$fecha_nacimiento,
		'Direccion'=>$direccion,
		'Telefono1'=>$telefono1,
		'Telefono2'=>$telefono2,
		'Correo'=>$correo,
		'Autoriza_datos'=>$autoriza_datoss
			);

			$login_terceros= array(
		'Nit'=>$nit,
		'Contrasena'=>$pass,
			'Terceros_Nit'=>$nit);


			$this->Terceros->crear_cliente($dat);
			$this->Login_terceros->crear_cliente($login_terceros);
			redirect(site_url());
	}


public function actualizar_view(){
	$filtro['nit']= $this->Terceros->filtro($this->session->userdata('Nit'));
	$filtro['contrasena']= $this->Login_terceros->ver_contrasena($this->session->userdata('Nit'));
	$this->load->view('cliente/actualizar',$filtro);
}

public function actualizar(){
	$nit = $this->input->post('nit');
	$nombres = $this->input->post('nombres');
	$razon_social = $this->input->post('razon_social');
	$fecha_nacimiento = $this->input->post('fecha_nacimiento');
	$direccion = $this->input->post('direccion');
	$telefono1=$this->input->post('telefono1');
	$telefono2=$this->input->post('telefono2');
	$correo=$this->input->post('correo');
	$autoriza_datoss=$this->input->post('autoriza_datos');
	$pass = $this->input->post('contrasena');
	$dat= array(
	'Nombres'=>$nombres,
	'Razon_social'=>$razon_social,
	'Fecha_nacimiento'=>$fecha_nacimiento,
	'Direccion'=>$direccion,
	'Telefono1'=>$telefono1,
	'Telefono2'=>$telefono2,
	'Correo'=>$correo,
	'Autoriza_datos'=>$autoriza_datoss
	);

	$login_terceros= array(
	'Nit'=>$nit,
	'Contrasena'=>$pass,
	'Terceros_Nit'=>$nit);


	$this->Terceros->actualizar_datos($nit,$dat);
	$this->Login_terceros->actualizar_datos($nit,$login_terceros);

}



////////////////////////////////////////////////////////   -----CITA---------////////////////////////////////
	public function agendar(){
		$nit = $this->input->post('nit');
		$km = $this->input->post('km');
		$placa = $this->input->post('placa');
		$fecha = $this->input->post('fecha');
		$hora = $this->input->post('hora');
		$operacion = $this->input->post('operacion');
		$notas= $this->input->post('notas');
		$responsable= $this->input->post('responsable');
		$sede= $this->input->post('sede');
		$num_cita= $this->input->post('cita');

		$combo_cita=  array(
									'Kilometraje' => $km ,
									'Fecha_inicial' => $fecha ,
									'Hora_inicial' => $hora,
									'Vehiculos_Placa' => $placa ,
									'Notas' => $notas,
									'Estado'=>'Pendiente',
									'Nombres_responsable'=>$responsable,
									'Sedes_id'=>$sede,
									'Terceros_Nit'=>$nit
									);

				$array_operaciones= array(
									'Cita_Id_cita'=> $num_cita,
									'Operaciones_Id_operacion'=> $operacion,
									'Estado_operacion'=>'Pendiente',
									'Valor_total'=> 0,
									'Operarios_cedula'=>777
				);

				$this->Cita->crear_cita($combo_cita);
				$this->Cita->crear_cita_relacion( $array_operaciones);


				$this->load->view('cliente/correcto');
	}

	public function agendar_view(){
		$datos['nit']= $this->Terceros->filtro($this->session->userdata('Nit'));
		$datos['conjunto']= $this->Operaciones->listar();
		$datos['placa']= $this->Vehiculos->listar_filtro($this->session->userdata('Nit'));
		$datos['sede']= $this->Sedes->listar();
		$datos['cita']= $this->Cita->traer_ultimo();

		$this->load->view('cliente/agendar', $datos );
	}

	public function consultar_view(){
		$datos['nit']= $this->Terceros->filtro($this->session->userdata('Nit'));
		$datos['consulta']= $this->Cita->buscar($this->session->userdata('Nit'));
		$this->load->view('cliente/consultar', $datos);
	}

	public function cancela(){
		$id= $this->input->post('id');
		$this->Cita->cancelar_relacion($id);
		$this->Cita->cancelar($id);
		redirect('Op_cliente/consultar_view');
	}



////////////////////////////////////////////////////////   -----VEHICULOS---------////////////////////////////////
	public function vehiculos_view(){
		$datos['nit']= $this->Terceros->filtro($this->session->userdata('Nit'));
		$datos['consulta']= $this->Vehiculos->consulta($this->session->userdata('Nit'));
		$this->load->view('cliente/vehiculos',$datos);
	}



	public function registrar_vh(){
		$placa = $this->input->post('placa');
		$ref = $this->input->post('referencia');
		$modelo = $this->input->post('modelo');
		$nit = $this->input->post('nit');


		$combo= array('Placa'=>$placa, 'Descripcion'=>$ref, 'Modelo'=>$modelo, 'nit_tercero'=>$nit);

		if ($this->Vehiculos->crearVehiculo($combo)) {
			redirect('Op_cliente/vehiculos_view');
		}
	}
	public function update_vehiculo(){
		$placa = $this->input->post('placa');
		$ref = $this->input->post('referencia');
		$modelo = $this->input->post('modelo');


		$combo= array('Descripcion'=>$ref, 'Modelo'=>$modelo);

		if ($this->Vehiculos->actualizar($placa,$combo)) {
			redirect('Op_cliente/vehiculos_view');
		}
	}

	public function eliminar(){
		$placa = $this->input->post('placa');
		if ($this->Vehiculos->eliminar($placa)) {
			echo '<script>alert("Se ha Eliminado Correctamente");</script>';
			redirect('Op_cliente/vehiculos_view');
		}

	}
	public function geteventos(){
		$r=$this->cita->geteventos();
		echo json_encode($r);
	}
	
	public function upevent(){
		$param['id'] = $this->input->post('id');
		$param['fecin'] = $this->input->post('fecin');
		$param['fecfi'] = $this->input->post('fecfi');
		$r = $this->cita->upevent($param);
		echo $r;
	}

}
