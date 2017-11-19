<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Model {

	public function __construct() {
        parent::__construct();
	}

	public function crearVehiculo($dato) {

		return $this->db->insert('vehiculos', $dato);

	}

	public function listar_filtro($dato){
		$this->db->from('vehiculos');
		$this->db->where('nit_tercero',$dato);
		$rta= $this->db->get();
		return $rta->result_array();
	}

	public function actualizar($id, $dato) {
		$this->db->where('Placa', $id);
		return $this->db->update('vehiculos', $dato);
	}

	public function eliminar($id) {
		$this->db->where('Placa', $id);
		return $this->db->delete('vehiculos');
	}

	public function listar() {
		$this->db->from('areas');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function consulta($nit) {
		$this->db->from('vehiculos');
		$this->db->where('nit_tercero',$nit);
		$query = $this->db->get();
		return $query->result_array();
	}




}
