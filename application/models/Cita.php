<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model {

	public function __construct() {

	}



	public function crear_cita($dato){
		return $this->db->insert('cita',$dato);
	}

	public function crear_cita_relacion($relacion){
				return $this->db->insert('cita_tiene_operaciones',$relacion);
	}

	public function traer_ultimo(){
		$rta= $this->db->query('select Id_cita from cita order by Id_cita desc limit 1');
		return $rta->result_array();
	}

	public function buscar($nit) {
		$this->db->from('cita');
		$this->db->where('Terceros_Nit',$nit);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cancelar($dato) {
		$this->db->where('Id_cita', $dato);
		return $this->db->delete('cita');
	}
	public function cancelar_relacion($dato) {
		$this->db->where('Cita_Id_cita', $dato);
		return $this->db->delete('cita_tiene_operaciones');
	}
	public function geteventos(){
		$this->db->select('Id_cita id,Vehiculos_placa title,Fecha_inicial start,Fecha_final end');
		$this->db->from('cita');
		return $this->db->get()->result();
	}
	public function upevent($param){
		$campos = array(
			'Fecha_inicial'=> $param['fecin'],
			'Fecha_final'=> $param['fecfi']
		);
		$this->db->where('Id_cita',$param['id']);
		$this->db->update('cita',$campos);
		
		if($this->db->affected_rows() == 1){
			return 1;
		}else{
			return 0;
		}
	}

}
