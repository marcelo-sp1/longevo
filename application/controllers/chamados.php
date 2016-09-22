<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chamados extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function listarID()
	{
		$this->load->model('m_sac');		
		$chamado = $this->input->post('chamado')? $this->input->post('chamado'): null;			
		$data['lista'] = $this->m_sac->listaUnicoChamado($chamado);
		unset($data['pagination']);		
		$this->load->view('lista',$data,'refresh'); 		
	}
	
	
	public function listar()
	{
		$this->load->model('m_sac');	
		$this->load->library('pagination');
		$maximo = 5;
		$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");		
		$config['base_url'] =  base_url('index.php/chamados/listar');
		$config['total_rows'] = $this->m_sac->contaRegistros();
		$config['per_page'] = 5;
		$qtd = $config['per_page'];
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";			
		$this->pagination->initialize($config); 		
		$data['pagination']	= $this->pagination->create_links();
		$data['lista'] = $this->m_sac->listaChamados($qtd,$inicio);	
		$this->load->view('lista',$data); 		
	}
	
}
