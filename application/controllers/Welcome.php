<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('form_validation');

    }

    public function index()
    {

        if ($this->input->post()) {

            $data = array(
                'nomeCompleto' => $this->input->post('nomeCompleto', TRUE),
                'nomeMae' => $this->input->post('nomeMae', TRUE),
                'dataNascimento' => $this->input->post('dataNascimento', TRUE),
                'numeroCpf' => $this->input->post('numeroCpf', TRUE),
                'numeroCartao' => $this->input->post('numeroCartao', TRUE),
                'dataCadastro' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('patients', $data);

            $patientId = $this->db->insert_id();

            $data = array(
                'patientId' => $patientId,
                'cep' => $this->input->post('cep', TRUE),
                'endereco' => $this->input->post('endereco', TRUE),
                'numero' => $this->input->post('numero', TRUE),
                'bairro' => $this->input->post('bairro', TRUE),
                'cidade' => $this->input->post('cidade', TRUE),
                'estado' => $this->input->post('estado', TRUE),
            );

            $this->db->insert('addresses', $data);


            $this->session->set_flashdata('message', 'Cadastrado com successo!');
            redirect(site_url(), 'refresh');
        }

        $data = array(
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
