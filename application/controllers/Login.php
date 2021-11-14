<?php

Class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $licencia = "SELECT DATEDIFF(licencia_fechalimite, CURDATE()) as dias FROM licencia WHERE licencia_id = 1";
        $lice = $this->db->query($licencia)->row_array();
        
        $this->load->model('empresa_model');
        $data['empresa'] = $this->empresa_model->get_empresa(1);

        if ($lice['dias'] <= 10) {
            $data['diaslic'] = $lice['dias'];
            $this->load->view('login/singin', $data);
        } else {
            $data['diaslic'] = 5000;
            $this->load->view('login/singin', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('', 'refresh');
    }

    public function mensajeacceso() {
        redirect('login/mensajeacceso');
    }

}
