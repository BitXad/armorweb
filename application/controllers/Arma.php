<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Arma extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Arma_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    } 

    /*
     * Listing of arma
     */
    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $data['arma'] = $this->Arma_model->get_all_arma();

            $data['_view'] = 'arma/index';
            $this->load->view('layouts/main',$data);
        }else {
            redirect('', 'refresh');
        }
    }

    /*
     * Listing of arma
     */
    function inventario()
    {
        if ($this->session->userdata('logged_in')) {
            $data['arma'] = $this->Arma_model->get_all_inventario();

            $data['_view'] = 'arma/inventario';
            $this->load->view('layouts/main',$data);
        }else {
            redirect('', 'refresh');
        }
    }

    /*
     * Listing of arma
     */
    function prestamos_activos()
    {
        if ($this->session->userdata('logged_in')) {
            $data['arma'] = $this->Arma_model->get_all_prestamos_activos();

            $data['_view'] = 'arma/prestamos_activos';
            $this->load->view('layouts/main',$data);
        }else {
            redirect('', 'refresh');
        }
    }

    /*
     * Adding a new arma
     */
    function add()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('arma_numorden','Num. orden','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('arma_codigo','Código','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                if (!empty($_FILES['arma_foto']['name'])){
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/arma/';
                    $img_full_path = $config['upload_path'];

                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['image_library'] = 'gd2';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('arma_foto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/arma/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/arma/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/arma/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 100;
                    $confi['height'] = 100;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }
                /* *********************FIN imagen***************************** */
                $usuario_id = $this->session_data['usuario_id'];
                $params = array(
                    'tipoarma_id' => $this->input->post('tipoarma_id'),
                    'persona_id' => $this->input->post('persona_id'),
                    'usuario_id' => $usuario_id,
                    'estado_id' => $this->input->post('persona_id'),
                    'arma_numorden' => $this->input->post('arma_numorden'),
                    'arma_codigo' => $this->input->post('arma_codigo'),
                    'arma_fechaingreso' => $this->input->post('arma_fechaingreso'),
                    'arma_horaingreso' => $this->input->post('arma_horaingreso'),
                    'arma_procedencia' => $this->input->post('arma_procedencia'),
                    'arma_marca' => $this->input->post('arma_marca'),
                    'arma_calibre' => $this->input->post('arma_calibre'),
                    'arma_aniodotacion' => $this->input->post('arma_aniodotacion'),
                    'arma_lugardotacion' => $this->input->post('arma_lugardotacion'),
                    'arma_novedades' => $this->input->post('arma_novedades'),
                    'arma_responsable' => $this->input->post('arma_responsable'),
                    'arma_foto' => $foto,
                );

                $arma_id = $this->Arma_model->add_arma($params);
                redirect('arma/index');
            }
            else
            {
                $this->load->model('Tipo_arma_model');
                $data['all_tipo_arma'] = $this->Tipo_arma_model->get_all_tipo_arma();

                $this->load->model('Persona_model');
                $data['all_persona'] = $this->Persona_model->get_all_persona_activa();

                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $this->load->model('Estado_model');
                $tipo = 3;
                $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);

                $data['_view'] = 'arma/add';
                $this->load->view('layouts/main',$data);
            }
        }else {
            redirect('', 'refresh');
        }
    }  

    /*
     * Editing a arma
     */
    function edit($arma_id)
    {
        if ($this->session->userdata('logged_in')) {
            // check if the arma exists before trying to edit it
            $data['arma'] = $this->Arma_model->get_arma($arma_id);
            if(isset($data['arma']['arma_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('arma_codigo','Arma Codigo','required');
                if($this->form_validation->run())     
                {
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                        $foto1= $this->input->post('arma_foto1');
                    if (!empty($_FILES['arma_foto']['name']))
                    {
                        $producto_catalogo = 1;
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/arma/';
                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 0;
                        $config['max_width'] = 0;
                        $config['max_height'] = 0;

                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('arma_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/arma/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                        }
                        /* ********************F I N  para resize***************************** */
                        //$directorio = base_url().'resources/imagenes/';
                        $base_url = explode('/', base_url());
                        //$directorio = FCPATH.'resources\images\productos\\';
                        $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/arma/';
                        //$directorio = $_SERVER['DOCUMENT_ROOT'].'/ximpleman_web/resources/images/productos/';
                        if(isset($foto1) && !empty($foto1)){
                          if(file_exists($directorio.$foto1)){
                              unlink($directorio.$foto1);
                              //$mimagenthumb = str_replace(".", "_thumb.", $foto1);
                              $mimagenthumb = "thumb_".$foto1;
                              if(file_exists($directorio.$mimagenthumb)){
                                  unlink($directorio.$mimagenthumb);
                              }
                          }
                      }
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/arma/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/arma/'."thumb_".$new_name.$extension;
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
                        'tipoarma_id' => $this->input->post('tipoarma_id'),
                        'persona_id' => $this->input->post('persona_id'),
                        'usuario_id' => $this->input->post('usuario_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'arma_numorden' => $this->input->post('arma_numorden'),
                        'arma_codigo' => $this->input->post('arma_codigo'),
                        'arma_fechaingreso' => $this->input->post('arma_fechaingreso'),
                        'arma_horaingreso' => $this->input->post('arma_horaingreso'),
                        'arma_procedencia' => $this->input->post('arma_procedencia'),
                        'arma_marca' => $this->input->post('arma_marca'),
                        'arma_calibre' => $this->input->post('arma_calibre'),
                        'arma_aniodotacion' => $this->input->post('arma_aniodotacion'),
                        'arma_lugardotacion' => $this->input->post('arma_lugardotacion'),
                        'arma_novedades' => $this->input->post('arma_novedades'),
                        'arma_responsable' => $this->input->post('arma_responsable'),
                        'arma_foto' => $foto,
                    );

                    $this->Arma_model->update_arma($arma_id,$params);            
                    redirect('arma/index');
                }
                else
                {
                    $this->load->model('Tipo_arma_model');
                    $data['all_tipo_arma'] = $this->Tipo_arma_model->get_all_tipo_arma();

                    $this->load->model('Persona_model');
                    $data['all_persona'] = $this->Persona_model->get_all_persona();

                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                    $this->load->model('Estado_model');
                    $tipo = 3;
                    $data['all_estado'] = $this->Estado_model->get_tipo_estado($tipo);

                    $data['_view'] = 'arma/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The arma you are trying to edit does not exist.');
        }else {
            redirect('', 'refresh');
        }
    } 

    /*
     * Deleting arma
     */
    function remove($arma_id)
    {
        if ($this->session->userdata('logged_in')) {
            $arma = $this->Arma_model->get_arma($arma_id);

            // check if the arma exists before trying to delete it
            if(isset($arma['arma_id']))
            {
                $this->Arma_model->delete_arma($arma_id);
                redirect('arma/index');
            }
            else
                show_error('The arma you are trying to delete does not exist.');
        }else {
            redirect('', 'refresh');
        }
    }
    
}
