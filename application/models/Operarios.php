<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Operarios extends CI_Model {

	public function __construct() {

	}


	public function listar(){
		$this->db->from('operarios');
		$rta= $this->db->get();
		return $rta->result_array();
	}

	public function agregar($dato){
		return $this->db->insert('operarios',$dato);
	}

	public function cambiar_estado($cedula,$dato){
		$this->db->where('Cedula',$cedula);
		return $this->db->update('operarios',$dato);
	}
}
