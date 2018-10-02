<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Curso_model extends CI_Model {
	
	
	public $table = 'tbl_curso_loop';
	public $id;
	public $nome;
	public $quant_semestre;
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
	
	public function lista_cursos(){
		$query = $this->db->get($this->table);
		return $query->result();		
	}
	
	public function pega_curso($id=false){
		if(!$id) return false;
		
		$this->db->where(array('id'=> $id, 'status'=> 1));
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
	public function pega_por_nome($nome=false){
		if(!$nome) return false;
		
		$this->db->where(array('nome'=> $nome));
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
	public function alterar($coluna=false, $valor=false, $id=false){
		
		return (bool)$this->db
		->set($coluna, $valor)
		->where('id', $id)
		->update($this->table);
		
	}
	
	public function deletar($id=false){
		return (bool)$this->db
		->where('id', $id)
		->delete($this->table);
	}
	
	
}