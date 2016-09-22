<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_sac extends CI_Model {
	
	/**
	 * Grava os dados na tabela.
	 * @param $dados. Array que contém os campos a serem inseridos
	 * @param $tabela contem o nome da tabela a ser inserida
	 * @return boolean
	 */
	public function store($dados = null,$tabela = null) {		
		if ($this->db->insert($tabela , $dados)) {			
			return true;
		} else {			
			return false;
		}		
	}	
		
	/**
	 * Recupera o registro de maior id do banco de dados	
	 * @return objeto da banco de dados da tabela clientes
	 */
	public function getMaxId($id = null){
				
		$query = $this->db->query('select max(id) from clientes');
		return $query->result(); 
	}
	/**
	 * procura um pedido
	 * @param $id do registro
	 * @return boolean;
	 */
	public function procPedido($id = null){
		if ($id) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get('pedidos');
		return $query->result(); 
	}
	/**
	 * lista unico chamados
	 * @return array();
	 */
	public function listaUnicoChamado($id){		
		$this->db->where('id', $id);			
		$query = $this->db->get('chamados');
		return $query->result(); 
	}	
	
	//quantidade total de registros
	function contaRegistros()
	{
		return $this->db->count_all_results('chamados');
	}
	
	/**
	 * lista todos os chamados
	 * @return array();
	 */
	public function listaChamados($qtd = null ,$inicio = null){
		if($qtd){
			$this->db->limit($qtd,$inicio);
		}		
		$query = $this->db->get('chamados');
		return $query->result(); 
	}
}
