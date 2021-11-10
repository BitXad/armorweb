<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_arma extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipo_arma_model');
    } 

    /*
     * Listing of tipo_arma
     */
    function index()
    {
        $data['tipo_arma'] = $this->Tipo_arma_model->get_all_tipo_arma();
        
        $data['_view'] = 'tipo_arma/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tipo_arma
     */
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipoarma_descripcion','Tipo de arma','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())     
        {
            $params = array(
                'tipoarma_descripcion' => $this->input->post('tipoarma_descripcion'),
            );
            $tipo_arma_id = $this->Tipo_arma_model->add_tipo_arma($params);
            redirect('tipo_arma/index');
        }else{            
            $data['_view'] = 'tipo_arma/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tipo_arma
     */
    function edit($tipoarma_id)
    {   
        // check if the tipo_arma exists before trying to edit it
        $data['tipo_arma'] = $this->Tipo_arma_model->get_tipo_arma($tipoarma_id);
        if(isset($data['tipo_arma']['tipoarma_id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tipoarma_descripcion','Tipo de arma','trim|required', array('required' => 'Este Campo no debe ser vacio'));
	    if($this->form_validation->run())     
            {
                $params = array(
                    'tipoarma_descripcion' => $this->input->post('tipoarma_descripcion'),
                );
                $this->Tipo_arma_model->update_tipo_arma($tipoarma_id,$params);            
                redirect('tipo_arma/index');
            }else{
                $data['_view'] = 'tipo_arma/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipo_arma you are trying to edit does not exist.');
    } 

    /*
     * Deleting tipo_arma
     */
    function remove($tipoarma_id)
    {
        $tipo_arma = $this->Tipo_arma_model->get_tipo_arma($tipoarma_id);

        // check if the tipo_arma exists before trying to delete it
        if(isset($tipo_arma['tipoarma_id']))
        {
            $this->Tipo_arma_model->delete_tipo_arma($tipoarma_id);
            redirect('tipo_arma/index');
        }
        else
            show_error('The tipo_arma you are trying to delete does not exist.');
    }
    
}
