<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Horario_model extends CI_Model {
	
	
	public $table = 'tbl_horario_trabalho_pomojob';
	public $id;
	public $tipo;
	public $data;
	
	function __construct() { parent::__construct(); }	
	
	public function inserir($tipo=false){
		
		if($tipo===false || $tipo==null) return false;
		$data = array('tipo' => $tipo,);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
			
	}
	
	public function lista_horarios(){
		
		$query = $this->db->get($this->table);
		return $query->result();
				
	}
	
	
	
}