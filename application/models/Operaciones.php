<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Operaciones extends CI_Model {

	public function __construct() {

	}



	public function listar(){
		$this->db->from('operaciones');
		$rta= $this->db->get();
		return $rta->result_array();
	}


	
}
