<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	
	
	public $table = 'tbl_admin_loop';
	public $id;
	public $login;
	public $senha;
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
	
	public function login($login=false, $senha=false){
		if(!$login) return false;
		
		$where = array(
			'login' => $login,
			'senha' => md5($senha),
			'status' => 1
		);
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->row();
		
	}
	
	
	
	
}