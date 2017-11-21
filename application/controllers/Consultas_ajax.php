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
		echo "<button>Este</button>";
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
		$nombre=$this->Terceros->traer_nombre($valor['Nit_tercero']);
		foreach ($nombre as $dato) {
			echo "<td>".$dato['Nombres']."</td>";
			};
		};

	}

	
}
