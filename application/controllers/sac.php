<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sac extends CI_Controller {

	
	public function index()
	{		
		$this->load->view('form_sac');
	}
		
	public function enviar()
	{		
		$this->load->model('m_sac');
		$id = $this->m_sac->getMaxId();	
		
		$dados_cli = array(
		    "id" => $id[0]->max+1,
			"nome" => $this->input->post('nome'),			
			"email" => $this->input->post('email')			
		);
		$dados_ped = array(			
		    "id" => $this->input->post('pedido'),
			"id_cli" => $id[0]->max+1,
			"dt_cadastro" => date('d/m/Y')
		);
		$dados_cham = array(
		    "id_ped" => $this->input->post('pedido'),
			"id" => rand(1,99999),
			"dt_cad" => date('d/m/Y'),
			"titulo" => $this->input->post('titulo'),			
			"obs" => $this->input->post('obs')		
		);		
		
		if ($this->m_sac->store($dados_cli,'clientes')) {			
			if($this->m_sac->store($dados_ped,'pedidos')){
				if($this->m_sac->store($dados_cham,'chamados')){
					$variaveis['mensagem'] = "Dados gravados com sucesso!";
				}else{
					$variaveis['mensagem'] = "Ocorreu um erro ao gravar os chamados.";
				}
			}else{
				$variaveis['mensagem'] = "Ocorreu um erro ao gravar os pedidos.";
			}	
		} else {
			$variaveis['mensagem'] = "Ocorreu um erro ao gravar o cliente";
			
		}
		$this->load->view('errors/html/v_erro', $variaveis);		
		
	
	}
}
