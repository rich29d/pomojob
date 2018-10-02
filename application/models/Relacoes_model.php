<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relacoes_model extends CI_Model {
	
	
	public $table = 'tbl_relacoes_loop';
	public $id;
	public $rgm_aluno;
	public $id_grupo;
	public $id_edicao;
	
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
	
	public function alterar($rgm_aluno, $id_relacao){
		if(!isset($rgm_aluno)) return false;
		return (bool)$this->db
		->set('rgm_aluno',  $rgm_aluno)
		->where('id', $id_relacao)
		->update($this->table);
		
	}
	
	public function consultar_aluno_edicao($rgm_aluno=false, $id_edicao=false){
		if(!$rgm_aluno) return false;
		
		$this->db->where(array('rgm_aluno'=>$rgm_aluno, 'id_edicao'=>$id_edicao, 'status'=> 1));
		$this->db->limit(1);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
	public function consultar_grupo($id_grupo=false){
		if(!$id_grupo) return false;
		
		$this->db->where(array('id_grupo'=>$id_grupo, 'status'=> 1));
		$query = $this->db->get($this->table);
		return $query->result();
		
	}
	
	public function consultar_participantes_grupo($id_grupo=false, $id_edicao=false, $menos_este=false){
		if(!$id_grupo) return false;
		
		if($menos_este){
			$where = array(
				'tbl_relacoes_loop.id_edicao' => $id_edicao,
				'tbl_relacoes_loop.id_grupo' => $id_grupo,
				'tbl_relacoes_loop.rgm_aluno !=' => $menos_este
			);
		}else{
			$where = array(
				'tbl_relacoes_loop.id_edicao' => $id_edicao,
				'tbl_relacoes_loop.id_grupo' => $id_grupo
			);	
		}
		
		
		$this->db->select('			
			tbl_alunos_loop.*
		');
		$this->db->from($this->table);
		$this->db->join('tbl_alunos_loop', 'tbl_relacoes_loop.rgm_aluno = tbl_alunos_loop.rgm', 'inner');
		$this->db->join('tbl_grupos_loop', 'tbl_relacoes_loop.id_grupo = tbl_grupos_loop.id', 'inner');
		$this->db->join('tbl_curso_loop', 'tbl_alunos_loop.id_curso = tbl_curso_loop.id', 'inner');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
		
	}
	
	public function lista_edicao(){
		$this->db->select('	
			tbl_edicao_loop.*,
			COUNT(DISTINCT tbl_relacoes_loop.id_grupo) AS quant_grupos,
			COUNT(tbl_relacoes_loop.rgm_aluno) AS quant_alunos
		');
		$this->db->from('tbl_edicao_loop');
		$this->db->join('tbl_relacoes_loop', 'tbl_edicao_loop.id = tbl_relacoes_loop.id_edicao', 'left'); 
		$this->db->group_by('tbl_edicao_loop.id');
		$this->db->order_by('tbl_edicao_loop.status'); 	 	
		$this->db->order_by('tbl_edicao_loop.numero'); 		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function lista_grupos($id_edicao=false){
		
		
		$where = array(
				'tbl_relacoes_loop.id_edicao' => $id_edicao
			);
		
		$this->db->select('	
			tbl_grupos_loop.*,
			COUNT(tbl_relacoes_loop.rgm_aluno) AS quant_alunos
		');
		$this->db->from('tbl_grupos_loop');
		$this->db->join('tbl_relacoes_loop', 'tbl_grupos_loop.id = tbl_relacoes_loop.id_grupo', 'left'); 
		$this->db->group_by('tbl_grupos_loop.id');
		$this->db->order_by('tbl_grupos_loop.id'); 		
		if($id_edicao) $this->db->where($where); 		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function lista_alunos($id_edicao=false){
		
		
		$where = array(
				'tbl_relacoes_loop.id_edicao' => $id_edicao
			);
		
		$this->db->select('	
			tbl_alunos_loop.*,
			tbl_grupos_loop.nome AS nome_grupo,
			tbl_curso_loop.nome AS nome_curso
		');
		$this->db->from('tbl_alunos_loop');
		$this->db->join('tbl_relacoes_loop', 'tbl_alunos_loop.rgm = tbl_relacoes_loop.rgm_aluno', $id_edicao!=false?'inner':'left'); 
		$this->db->join('tbl_grupos_loop', 'tbl_relacoes_loop.id_grupo = tbl_grupos_loop.id', 'inner');
		$this->db->join('tbl_curso_loop', 'tbl_alunos_loop.id_curso = tbl_curso_loop.id', 'inner'); 
		$this->db->group_by('tbl_alunos_loop.rgm');
		$this->db->order_by('tbl_relacoes_loop.id_grupo'); 		
		if($id_edicao) $this->db->where($where); 		
		$query = $this->db->get();
		return $query->result();
	}
	
	
}