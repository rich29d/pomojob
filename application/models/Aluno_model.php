<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aluno_model extends CI_Model {
	
	
	public $table = 'tbl_alunos_loop';
	public $id;
	public $id_curso;
	public $semestre;
	public $rgm;
	public $nome;
	public $email;
	public $status = 1;
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
	
	public function alterar($data){
		if(!isset($data)) return false;
		return (bool)$this->db
		->where('id', $data->id)
		->update($this->table,$data);
		
	}
	
	public function consultar_por_rgm($rgm=false){
		if(!$rgm) return false;
		
		$this->db->where(array('rgm'=>$rgm));
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
	public function consultar_por_id($id_aluno=false){
		if(!$id_aluno) return false;
		
		$this->db->where(array('id'=>$id_aluno));
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
	public function login($rgm=false, $email=false, $id_edicao=false){
		if(!$rgm) return false;
		
		$where = array(
			'tbl_relacoes_loop.id_edicao' => $id_edicao,
			'tbl_alunos_loop.email' => $email,
			'tbl_relacoes_loop.rgm_aluno' => $rgm,
			'tbl_relacoes_loop.status' => 1,
			'tbl_alunos_loop.status' => 1
		);
		
		$this->db->select('			
			tbl_grupos_loop.*,
			tbl_alunos_loop.*,
			
			tbl_grupos_loop.id AS id_grupo,
			tbl_alunos_loop.id AS id_aluno,
			
			tbl_grupos_loop.nome AS nome_grupo,			
			tbl_alunos_loop.nome AS nome_aluno,
			tbl_curso_loop.nome AS nome_curso
		');
		$this->db->from($this->table);
		$this->db->join('tbl_relacoes_loop', 'tbl_alunos_loop.rgm = tbl_relacoes_loop.rgm_aluno', 'inner');
		$this->db->join('tbl_grupos_loop', 'tbl_relacoes_loop.id_grupo = tbl_grupos_loop.id', 'inner');
		$this->db->join('tbl_curso_loop', 'tbl_alunos_loop.id_curso = tbl_curso_loop.id', 'inner');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
		
	}
	
	
	
	
}