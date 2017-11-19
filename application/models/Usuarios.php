<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

	public function __construct() {

	}

	public function filtro($dato){
		$this->db->from('usuarios');
		$this->db->where('Id_usuario',$dato);
		$rta= $this->db->get();
		return $rta->result_array();

	}

	public function actualizar_datos($llave,$datos){
		$this->db->where('Nit',$llave);
		return $this->db->update('terceros',$datos);
	}

	public function login($cedula, $clave) {
		$this->db->from('Terceros');
		$this->db->where('nit',$cedula);
		$this->db->where('contrasena',$clave);
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
	public function crear_cliente($dato){
		return $this->db->insert('terceros',$dato);
	}
}
