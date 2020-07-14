<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');		
		$this->load->model('form_validation');

	}

	public function index()
	{
		
				if ($this->input->post()){
					
					
				}
		
		    $data = array(
            'button' => 'Salvar',
            'action' => site_url('patients/create'),
	    'id' => set_value('id'),
	    'nomeCompleto' => set_value('nomeCompleto'),
	    'nomeMae' => set_value('nomeMae'),
	    'dataNascimento' => set_value('dataNascimento'),
	    'numeroCpf' => set_value('numeroCpf'),
	    'numeroCartao' => set_value('numeroCartao'),
	    'cep' => set_value('cep'),
		'endereco' => set_value('endereco'),
		'numero' => set_value('numero'),
		'cidade' => set_value('cidade'),
		'bairro' => set_value('bairro'),
		'estado' => set_value('estado'),
	);
	
	    $this->load->view('header');	
		$this->load->view('home', $data);
		$this->load->view('footer');
	}
}
