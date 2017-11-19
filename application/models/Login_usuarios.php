<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_usuarios extends CI_Model {

	public function __construct() {

	}


	public function login($cedula, $clave) {
		$this->db->from('login_usuarios');
		$this->db->where('Nit',$cedula);
		$this->db->where('Contrasena',$clave);
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}

}
