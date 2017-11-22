<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model {

	public function __construct() {

	}



	public function crear_cita($datos){
		$fecha = date($datos['fecha']);
		$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

		echo $nuevafecha;
		$campos=array(

			'Kilometraje'=>$datos['km'],
			'Estado'=>$datos['estado'],
			'Notas'=>$datos['notas'],
			'Fecha_inicial'=>$datos['fecha'],
			'Hora_inicial'=>$datos['hora'],
			'Nombres_responsable'=>$datos['responsable'],
			'Sedes_Id'=>$datos['sede'],
			'Terceros_Nit'=>$datos['nit'],
			'Vehiculos_Placa'=>$datos['placa'],
			'Sedes_Id'=>$datos['sede'],
			'Terceros_Nit'=>$datos['nit'],
			'Vehiculos_Placa'=>$datos['placa'],
			'Estado'=>$datos['estado'],
			'Fecha_final'=>$nuevafecha,
			'Hora_final'=>$datos['hora']


		);

		return $this->db->insert('cita',$campos);

	}

	public function crear_cita_relacion($datos){
		$operacion=array(
			'Estado_operacion'=>$datos['estado'],
			'Operarios_Cedula'=>$datos['operario'],
			'Cita_Id_cita'=>$datos['ultimo'],
			'Operaciones_Id_operacion'=>$datos['operacion']
		);
				return $this->db->insert('cita_tiene_operaciones',$operacion);
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
		$this->db->where('Estado',"Pendiente");
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
		$this->db->where('Id_cita',$dato);
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

	public function por_confirmar(){
  		$query=$this->db->query('SELECT * FROM cita WHERE Estado="Pendiente" OR Estado="Aplazada"');
			return $query->result_array();
		}

		public function citas_confirmadas(){
			$this->db->from('cita');
			$this->db->where('Estado',"Confirmada");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function nombre_operacion($dato){
			$this->db->from('operaciones');
			$this->db->where('Id_operacion',$dato);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function listar(){
			$this->db->from('cita');
			$query = $this->db->get();
			return $query->result_array();
		}


		public function rango_citas_canceladas($fecha_inicial,$fecha_final){
			$rta=$this->db->query("SELECT * FROM cita WHERE Fecha_inicial BETWEEN '$fecha_inicial' AND '$fecha_final'");

			return $rta	->result_array();
		}

		public function confirmar($dato){
			$this->db->where('Id_cita',$dato);
			$combo=array('Estado'=>"Confirmada");
			return $this->db->update('cita',$combo);
		}

		public function concluir_cita($dato){
			$this->db->where('Id_cita',$dato);
			$combo=array('Estado'=>"Finalizada");
			return $this->db->update('cita',$combo);
		}

		public function aplazar($codigo,$fecha){
			$this->db->where('Id_cita',$codigo);
			$combo=array('Fecha_inicial'=>$fecha,'Fecha_final'=>$fecha,'Estado'=>"Aplazada");
			$this->db->update('cita',$combo);
}
		public function cancel($parametro){
			$campo=array('Estado'=>"Cancelado");
			$this->db->where('Id_cita',$parametro['id']);
			$this->db->update('cita',$campo);
			if($this->db->affected_rows() == 1){
				return 1;
			}else{
				return 0;
			}

		}
}
