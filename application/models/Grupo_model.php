<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Grupo_model extends CI_Model {
	
	
	public $table = 'tbl_grupos_loop';
	public $id;
	public $id_edicao;
	public $nome;
	public $status;
	public $data_criacao;
	
	function __construct() {
        parent::__construct();
		$this->load->database();
    }
	
	public function inserir($data){
		if(!isset($data)) return false;
		$insert =  $this->db->insert($this->table, $data);
		
		if($insert) return $this->db->insert_id();
		else return false;
		
	}
	
	public function consultar_por_nome($data=false){
		if(!$data) return false;
		
		$this->db->where($data);
		$this->db->where(array('status'=> 1));
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
}