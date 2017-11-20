<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model {

	public function __construct() {

	}



	public function crear_cita($datos){
		$campos=array(
			'Sedes_Id'=>$datos['sede1'],
			'Terceros_Nit'=>$datos['nit1'],
			'Vehiculos_Placa'=>$datos['placa1'],
			'Estado'=>"Pendiente"
		);
		return $this->db->insert('cita',$campos);
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
		$cancela=array('Estado'=>"Cancelada");
		return $this->db->update('cita',$cancela);
	}
	public function cancelar_relacion($dato) {
		$this->db->where('Cita_Id_cita', $dato);
		return $this->db->delete('cita_tiene_operaciones');
	}
	public function geteventos($dato){
		$this->db->select('Id_cita id,Vehiculos_placa title,Fecha_inicial start,Fecha_final end');
		$this->db->where('Terceros_Nit',$dato);
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

	public function buscar_cita($dato){
		$this->db->where('codigo',$dato);
		$this->db->from('cita');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function buscar_operaciones($dato){
		$this->db->from('cita_tiene_operaciones');
		$this->db->where('Cita_Id_cita',$dato);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listar_proximas($dato){
  		$this->db->from('cita');
			$this->db->where('Fecha_inicial <',$dato);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function listar(){
			$this->db->from('cita');
			$query = $this->db->get();
			return $query->result_array();
		}
}
