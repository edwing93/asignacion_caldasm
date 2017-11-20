<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas_ajax extends CI_Controller {

	var $user;

	function __construct() {
        	parent::__construct();
    	}

	public function terceros(){
		$nit=$this->input->post('nit');
		$consulta=$this->Terceros->filtro($nit);

		if($consulta==NULL){
			echo "<h1>¡No hay Resutados...!</h>";
		}
		foreach ($consulta as $valor) {

		echo "<td>".$valor['Nombres']."</td>";
		echo "<td>".$valor['Fecha_nacimiento']."</td>";
		echo "<td>".$valor['Direccion']."</td>";
		echo "<td>".$valor['Telefono1']."</td>";
		echo "<td>".$valor['Telefono2']."</td>";
		echo "<td>".$valor['Correo']."</td>";


		};
	}


	public function vehiculos(){
		$placa=$this->input->post('placa');
		$consulta=$this->Vehiculos->buscar_placa($placa);

		if($consulta==NULL){
			echo "<h1>¡No hay Resutados...!</h>";
		}
		foreach ($consulta as $valor) {

		echo "<td>".$valor['Descripcion']."</td>";
		echo "<td>".$valor['Modelo']."</td>";
		echo "<td>".$valor['Nit_tercero']."</td>";

		};

	}

	public function ir_cita(){
		$codigo=$this->input->post("codigo");
		$consulta=$this->Cita->buscar_cita($codigo);
		$operaciones=$this->Cita->buscar_operaciones($codigo);

		foreach ($consulta as $valor) {

		echo "<td>".$valor['Notas']."</td>";
		echo "<td>".$valor['Hora_inicial']."</td>";
		echo "<td>".$valor['Nit_tercero']."</td>";
		};

	}
}
