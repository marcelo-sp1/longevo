<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedidos extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	public function buscar()
	{
		$this->load->model('m_sac');
		$pedido = $this->input->post('pedido');	
		$rs = $this->m_sac->procPedido($pedido);
		if(!isset($rs[0])){			
			echo 'erro';exit;
		}		
		echo 'ok';exit;
	}
	
}
