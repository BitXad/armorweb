<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estado extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Estado_model');
    } 

    /*
     * Listing of estado
     */
    function index()
    {
        $data['estado'] = $this->Estado_model->get_all_estado();
        
        $data['_view'] = 'estado/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new estado
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'estado_descripcion' => $this->input->post('estado_descripcion'),
				'estado_color' => $this->input->post('estado_color'),
            );
            
            $estado_id = $this->Estado_model->add_estado($params);
            redirect('estado/index');
        }
        else
        {            
            $data['_view'] = 'estado/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a estado
     */
    function edit($estado_id)
    {   
        // check if the estado exists before trying to edit it
        $data['estado'] = $this->Estado_model->get_estado($estado_id);
        
        if(isset($data['estado']['estado_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'estado_descripcion' => $this->input->post('estado_descripcion'),
					'estado_color' => $this->input->post('estado_color'),
                );

                $this->Estado_model->update_estado($estado_id,$params);            
                redirect('estado/index');
            }
            else
            {
                $data['_view'] = 'estado/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The estado you are trying to edit does not exist.');
    } 

    /*
     * Deleting estado
     */
    function remove($estado_id)
    {
        $estado = $this->Estado_model->get_estado($estado_id);

        // check if the estado exists before trying to delete it
        if(isset($estado['estado_id']))
        {
            $this->Estado_model->delete_estado($estado_id);
            redirect('estado/index');
        }
        else
            show_error('The estado you are trying to delete does not exist.');
    }
    
}
