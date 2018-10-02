<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public $edicao_atual = false;
	
	function __construct() {
        parent::__construct();
		//$this->load->database();
    }

	public function index()
	{
		$this->load->view('home'); // Edição finalzada
		
	}

    /*public function cadastrar_usuario()
    {

        $aluno = new Aluno_model();

        $acao = $this->input->post("acao_aluno");
        $id_grupo = $this->input->post("id_grupo");
        $id_relacao = $return['id_relacao'] = $this->input->post("id_relacao");

        $aluno->id = $return['id_aluno'] = $this->input->post("id");
        $aluno->id_curso = $this->input->post("id_curso");
        $aluno->semestre = $this->input->post("semestre");
        $aluno->rgm = $this->input->post("rgm");
        $aluno->nome = $this->input->post("nome");
        $aluno->email = $this->input->post("email");

        unset($aluno->table);

        $consulta = $this->Relacoes_model->consultar_aluno_edicao($aluno->rgm,$this->edicao_atual->id );
        $rel_grupo = $this->Relacoes_model->consultar_grupo($id_grupo);

        $return['sucesso'] = true;

        if((!count($consulta) && count($rel_grupo)<3) || $acao != 'cadastrar'){

            $consulta_aluno = $this->Aluno_model->consultar_por_id($return['id_aluno']);

            if(empty($consulta_aluno)) $return['id_aluno'] = $this->Aluno_model->inserir($aluno);
            else $this->Aluno_model->alterar($aluno);


            $return['data'] = date("d/m", strtotime($this->edicao_atual->data));

            if($return['id_aluno']!=false){
                if($acao == 'cadastrar') $return['id_relacao'] = $this->criar_relacao($aluno->rgm, $id_grupo);
                else $this->Relacoes_model->alterar($aluno->rgm, $id_relacao);
            }

        }else{

            if(count($consulta)) $return['erro_code'] = "2-0"; //Aluno já está participando da edição atual
            else if(!count($rel_grupo)<3) $return['erro_code'] = "1-1"; //Já existem 3 participantes neste grupo
            $return['quant'] = count($rel_grupo);
            $return['sucesso'] = false;
        }

        $this->load->view('json',array('return'=>$return));

    }

    public function criar_relacao($rgm_aluno=false, $id_grupo=false)
    {


        $data = array(
            'id_edicao' => $this->edicao_atual->id,
            'rgm_aluno' => $rgm_aluno,
            'id_grupo'  => $id_grupo
        );

        return $this->Relacoes_model->inserir($data);;

    }*/
	
	
	
	
}
