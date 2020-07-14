<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('my');
        $this->load->library('form_validation');
        $this->load->library('cns');

        // $this->load->model('Patients_model', 'Demandas_model');

    }

    public function index()
    {

        if ($this->input->post()) {


            $this->form_validation->set_rules('nomeCompleto', 'nomeCompleto', 'trim|required', array('required' => 'O campo nome é obrigatório'));

            $this->form_validation->set_rules('nomeMae', 'nomeMae', 'trim|required', array('required' => 'O campo nome da mãe é obrigatório'));

            $this->form_validation->set_rules('dataNascimento', 'dataNascimento', 'trim|required|callback_check_birthday', array('required' => 'O campo bairro é obrigatório', 'callback_check_birthday' => 'Data inválida'));

            $this->form_validation->set_rules('numeroCpf', 'numeroCpf', 'trim|required|callback_check_cpf', array('required' => 'O campo cpf é obrigatório', 'callback_check_birthday' => 'Numero do CPF inválido'));

            $this->form_validation->set_rules('numeroCartao', 'numeroCartao', 'trim|required|callback_check_cns', array('required' => 'O campo numero do CNS é obrigatório', 'callback_check_cns' => 'Numero do CNS inválido'));



            if ($this->form_validation->run() === FALSE) {
                //   $this->session->set_flashdata('error', 'Nome de usuario ou senha estão errados');
                $data = [
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
                ];
                $this->load->view('header');
                $this->load->view('home', $data);
                $this->load->view('footer');
            }

            $data = [
                'nomeCompleto' => $this->input->post('nomeCompleto', TRUE),
                'nomeMae' => $this->input->post('nomeMae', TRUE),
                'dataNascimento' => $this->input->post('dataNascimento', TRUE),
                'numeroCpf' => cleanCPF($this->input->post('numeroCpf', TRUE)),
                'numeroCartao' => $this->input->post('numeroCartao', TRUE),
                'dataCadastro' => date('Y-m-d H:i:s'),
            ];

            $this->db->insert('patients', $data);

            $patientId = $this->db->insert_id();

            $data = [
                'patientId' => $patientId,
                'cep' => $this->input->post('cep', TRUE),
                'endereco' => $this->input->post('endereco', TRUE),
                'numero' => $this->input->post('numero', TRUE),
                'bairro' => $this->input->post('bairro', TRUE),
                'cidade' => $this->input->post('cidade', TRUE),
                'estado' => $this->input->post('estado', TRUE),
            ];

            $this->db->insert('addresses', $data);


            $this->session->set_flashdata('message', 'Cadastrado com successo!');
            redirect(site_url(), 'refresh');
        }

        $data = [
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
        ];

        $this->load->view('header');
        $this->load->view('home', $data);
        $this->load->view('footer');
    }

    function check_birthday($dataNascimento)
    {
        $dataNascimento = DateTime::createFromFormat('d/m/Y', $_POST['dataNascimento']);
        if ($dataNascimento && $data->format('d/m/Y') === $_POST['dataNascimento']) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_cpf($numeroCpf)
    {
        $result = validateCPF($numeroCpf);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_cns($numeroCartao)
    {
        $result = $this->cns->run($numeroCartao);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
