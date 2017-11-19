<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sedes extends CI_Model {

	public function __construct() {

	}



	public function listar(){
		$this->db->from('sedes');
		$rta= $this->db->get();
		return $rta->result_array();
	}



}
