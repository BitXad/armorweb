<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Persona extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persona_model');
        $this->load->model('Estado_model');
        $this->load->model('Tipo_persona_model');
        $this->load->model('Grado_persona_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    } 

    /*
     * Listing of persona
     */
    function index()
    {
        $data['persona'] = $this->Persona_model->get_all_persona();
        
        $data['_view'] = 'persona/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new persona
     */
    function add()
    {   
        $this->form_validation->set_rules('persona_nombre', 'Persona Nombre', 'required');
        if ($this->form_validation->run()) {
            /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['persona_foto']['name'])){
                $this->load->library('image_lib');
                $config['upload_path'] = './resources/images/personas/';
                $img_full_path = $config['upload_path'];

                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size'] = 200000;
                $config['max_width'] = 2900;
                $config['max_height'] = 2900;
                
                $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                $config['file_name'] = $new_name; //.$extencion;
                $config['file_ext_tolower'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload('persona_foto');

                $img_data = $this->upload->data();
                $extension = $img_data['file_ext'];
                /* ********************INICIO para resize***************************** */
                if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                    $conf['image_library'] = 'gd2';
                    $conf['source_image'] = $img_data['full_path'];
                    $conf['new_image'] = './resources/images/personas/';
                    $conf['maintain_ratio'] = TRUE;
                    $conf['create_thumb'] = FALSE;
                    $conf['width'] = 400;
                    $conf['height'] = 300;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($conf);
                    if(!$this->image_lib->resize()){
                        echo $this->image_lib->display_errors('','');
                    }
                }
                /* ********************F I N  para resize***************************** */
                $confi['image_library'] = 'gd2';
                $confi['source_image'] = './resources/images/personas/'.$new_name.$extension;
                $confi['new_image'] = './resources/images/personas/'."thumb_".$new_name.$extension;
                $confi['create_thumb'] = FALSE;
                $confi['maintain_ratio'] = TRUE;
                $confi['width'] = 100;
                $confi['height'] = 100;

                $this->image_lib->clear();
                $this->image_lib->initialize($confi);
                $this->image_lib->resize();

                $foto = $new_name.$extension;
            }else{
                $foto = 'default.jpg';
            }
            /* *********************FIN imagen***************************** */
            $params = array(
				'grado_id' => $this->input->post('grado_id'),
				'estado_id' => $this->input->post('estado_id'),
				'tipo_id' => $this->input->post('tipo_id'),
				'persona_nombre' => $this->input->post('persona_nombre'),
				'persona_apellido' => $this->input->post('persona_apellido'),
				'persona_ci' => $this->input->post('persona_ci'),
				'persona_telefono' => $this->input->post('persona_telefono'),
				'persona_celular' => $this->input->post('persona_celular'),
				'persona_direccion' => $this->input->post('persona_direccion'),
                'persona_foto' => $foto,
            );
            
            $persona_id = $this->Persona_model->add_persona($params);
            redirect('persona/index');
        }
        else
        {
            
			$data['all_grado_persona'] = $this->Grado_persona_model->get_all_grado_persona();

			$data['all_estado'] = $this->Estado_model->get_all_estado();

			$data['all_tipo_persona'] = $this->Tipo_persona_model->get_all_tipo_persona();
            
            $data['_view'] = 'persona/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a persona
     */
    function edit($persona_id)
    {   
        // check if the persona exists before trying to edit it
        $data['persona'] = $this->Persona_model->get_persona($persona_id);
        $this->form_validation->set_rules('persona_nombre', 'Persona Nombre', 'required');
        
        if(isset($data['persona']['persona_id']))
        {
            if ($this->form_validation->run()){ 
                /* *********************INICIO imagen***************************** */
                $foto="";
                $foto1= $this->input->post('persona_foto1');
                if (!empty($_FILES['persona_foto']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/personas/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 5900;
                    $config['max_height'] = 5900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('persona_foto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/personas/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 400;
                        $conf['height'] = 300;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    $base_url = explode('/', base_url());
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/personas/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          $mimagenthumb = "thumb_".$foto1;
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/personas/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/personas/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 100;
                    $confi['height'] = 100;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }else{
                    $foto = $foto1;
                }
            /* *********************FIN imagen***************************** */
                $params = array(
					'grado_id' => $this->input->post('grado_id'),
					'estado_id' => $this->input->post('estado_id'),
					'tipo_id' => $this->input->post('tipo_id'),
					'persona_nombre' => $this->input->post('persona_nombre'),
					'persona_apellido' => $this->input->post('persona_apellido'),
					'persona_ci' => $this->input->post('persona_ci'),
					'persona_telefono' => $this->input->post('persona_telefono'),
					'persona_celular' => $this->input->post('persona_celular'),
					'persona_direccion' => $this->input->post('persona_direccion'),
                    'persona_foto' => $foto,
                );

                $this->Persona_model->update_persona($persona_id,$params);            
                redirect('persona/index');
            }
            else
            {
				$this->load->model('Grado_persona_model');
				$data['all_grado_persona'] = $this->Grado_persona_model->get_all_grado_persona();

				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

				$this->load->model('Tipo_persona_model');
				$data['all_tipo_persona'] = $this->Tipo_persona_model->get_all_tipo_persona();

                $data['_view'] = 'persona/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The persona you are trying to edit does not exist.');
    } 

    /*
     * Deleting persona
     */
    function remove($persona_id)
    {
        $persona = $this->Persona_model->get_persona($persona_id);

        // check if the persona exists before trying to delete it
        if(isset($persona['persona_id']))
        {
            $this->Persona_model->delete_persona($persona_id);
            redirect('persona/index');
        }
        else
            show_error('The persona you are trying to delete does not exist.');
    }
    /* busca personas desde modulo salida de armas */
    function buscarpersonas()
    {
        if ($this->input->is_ajax_request()) {
            $parametro = $this->input->post('parametro');   
            if($parametro!=""){
                $datos = $this->Persona_model->buscar_personasparametro($parametro);            
                echo json_encode($datos);
            }
            else echo json_encode(null);
        }
        else
        {                 
            show_404();
        }
    }
    
    function buscar_persona(){
        if($this->input->is_ajax_request()){
            $ci = $this->input->post('ci');
            $result = $this->Persona_model->get_info_persona($ci);
            echo json_encode($result);
        }else{
            show_404();
        }
    }
}
