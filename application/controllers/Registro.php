<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Registro extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persona_model');
        $this->load->model('Registro_model');
        $this->load->model('Empresa_model');
        $this->load->model('Arma_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    } 

    /*
     * Listing of registro
     */
    function index()
    {
        $data['registro'] = $this->Registro_model->get_all_registro();
        $this->load->model('empresa_model');
        $data['empresa'] = $this->empresa_model->get_empresa(1);
        
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new registro
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'persona_id' => $this->input->post('persona_id'),
				'arma_id' => $this->input->post('arma_id'),
				'registro_fechasalida' => $this->input->post('registro_fechasalida'),
				'registro_horasalida' => $this->input->post('registro_horasalida'),
				'registro_fechaingreso' => $this->input->post('registro_fechaingreso'),
				'registro_horaingreso' => $this->input->post('registro_horaingreso'),
				'registro_observacion' => $this->input->post('registro_observacion'),
            );
            
            $registro_id = $this->Registro_model->add_registro($params);
            redirect('registro/index');
        }
        else
        {
			$this->load->model('Persona_model');
			$data['all_persona'] = $this->Persona_model->get_all_persona();

			$this->load->model('Arma_model');
			$data['all_arma'] = $this->Arma_model->get_all_arma();
            
            $data['_view'] = 'registro/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a registro
     */
    function edit($registro_id)
    {   
        // check if the registro exists before trying to edit it
        $data['registro'] = $this->Registro_model->get_registro($registro_id);
        
        if(isset($data['registro']['registro_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'persona_id' => $this->input->post('persona_id'),
					'arma_id' => $this->input->post('arma_id'),
					'registro_fechasalida' => $this->input->post('registro_fechasalida'),
					'registro_horasalida' => $this->input->post('registro_horasalida'),
					'registro_fechaingreso' => $this->input->post('registro_fechaingreso'),
					'registro_horaingreso' => $this->input->post('registro_horaingreso'),
					'registro_observacion' => $this->input->post('registro_observacion'),
                );

                $this->Registro_model->update_registro($registro_id,$params);            
                redirect('registro/index');
            }
            else
            {
				$this->load->model('Persona_model');
				$data['all_persona'] = $this->Persona_model->get_all_persona();

				$this->load->model('Arma_model');
				$data['all_arma'] = $this->Arma_model->get_all_arma();

                $data['_view'] = 'registro/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The registro you are trying to edit does not exist.');
    } 

    /*
     * Deleting registro
     */
    function remove($registro_id)
    {
        $registro = $this->Registro_model->get_registro($registro_id);

        // check if the registro exists before trying to delete it
        if(isset($registro['registro_id']))
        {
            $this->Registro_model->delete_registro($registro_id);
            redirect('registro/index');
        }
        else
            show_error('The registro you are trying to delete does not exist.');
    }

    function buscar_personas(){
        $parametro = $this->input->post("parametro");
        $lista = $this->Persona_model->buscar_personas($parametro);
        echo json_encode($lista);
    }
    function entrega_equipo(){
        $id=$this->input->post('id');
        $observacion = $this->input->post('observacion');
        $params = array(
            'registro_fechaingreso' => date('Y-m-d'),
            'registro_horaingreso' => date('H:i:s'),
            'registro_observacion' => $observacion,
        );
        $registro = $this->Registro_model->update_registro($id,$params);
    }

    function imprimir($registro_id){
        $data['registro'] = $this->Registro_model->get_registro_impresion($registro_id);
        // $data['all_persona'] = $this->Persona_model->get_all_persona();
        // $this->load->model('Arma_model');
        // $data['all_arma'] = $this->Arma_model->get_all_arma();

        $data['_view'] = 'registro/nota_preimpreso_carta';
        $this->load->view('layouts/main',$data);
    }

    function devolucion(){
        $data['registro'] = $this->Registro_model->get_all_registro();
        
        $data['_view'] = 'registro/devolucion';
        $this->load->view('layouts/main',$data);
    }

    function get_all_registros(){
        $persona_id = $this->input->post('persona_id');
        $respuesta = $this->Registro_model->get_all_registros($persona_id);
        echo json_encode($respuesta);
    }
    function get_detalle_registro(){
        $registro_id = $this->input->post('registro_id');
        $resultado = $this->Registro_model->get_all_detalleregistro($registro_id);
        echo json_encode($resultado);
    }
    function arma_registrada(){
        if ($this->input->is_ajax_request()) {
            $detregistro_id = $this->input->post("detalle_registro");
            $params = array(
                'estado_id'=> 6,
                'detregistro_fechadevolucion' => date('Y-m-d'),
                'detregistro_horadevolucion' => date('H:i:s'),
            );
            $this->Registro_model->update_detregistro($detregistro_id,$params); 
        }
    }
    function guardar_registro(){
        if ($this->input->is_ajax_request()){
            $persona_id = $this->input->post("persona");
            $registro_id = $this->input->post("registro");
            $detregistros = $this->input->post("detregistros");
            foreach ($detregistros as $dr) {
                $parmas2 = array(
                    "detregistro_observacion"=>$dr['detregistro_observacion'],
                    "detregistro_devuelto"=>$dr['detregistro_devuelto'],
                );
                $this->Registro_model->update_detregistro($dr['detregistro_id'],$parmas2);
            }

            $params = array(
                "estado_id" => 6,
            );
            $this->Registro_model->update_registro($registro_id,$params);
            
            $this->comprobantedev($registro_id);
        }
    }

    function get_armas_pendientes_entrega(){
        if ($this->input->is_ajax_request()){
            $persona_id = $this->input->post("persona_id");
            $resultado = $this->Registro_model->get_armas_pendientes_entregar($persona_id);
            echo json_encode($resultado);
        }else{
            show_404();
        }
    }
    
    /*
     * Comprobante de registro
     */
    function comprobantepres($registro_id)
    {
        if ($this->session->userdata('logged_in')) {
            $data['registro'] = $this->Registro_model->get_comprobante($registro_id);
            $data['empresa'] = $this->Empresa_model->get_empresa(1);

            $data['_view'] = 'registro/comprobantepres';
            $this->load->view('layouts/main',$data);
        }else {
            redirect('', 'refresh');
        }
    }
    
    /*
     * Comprobante de registro
     */
    function comprobantedev($registro_id)
    {
        if ($this->session->userdata('logged_in')) {
            $data['registro'] = $this->Registro_model->get_comprobante($registro_id);
            $data['empresa'] = $this->Empresa_model->get_empresa(1);

            $data['_view'] = 'registro/comprobantedev';
            $this->load->view('layouts/main',$data);
        }else {
            redirect('', 'refresh');
        }
    }
    
    /*
     * Listing of registro
     */
    function reimpresion()
    {
        //$data['registro'] = $this->Registro_model->get_all_registro();
        
        $data['_view'] = 'registro/reimpresion';
        $this->load->view('layouts/main',$data);
    }
    
    
    /*
     * Listing of registro
     */
    function reimprimir()
    {
        //$data['registro'] = $this->Registro_model->get_all_registro();
        $registro_id = $this->input->post('registro_id');
        $opcion = $this->input->post('num_opcion');
        //$data['_view'] = 'registro/reimpresion';
        //$this->load->view('layouts/main',$data);
        
        if ($this->session->userdata('logged_in')) {
            
            if($opcion==1){
                $data['registro'] = $this->Registro_model->get_comprobante($registro_id);
                $data['empresa'] = $this->Empresa_model->get_empresa(1);

                $data['_view'] = 'registro/comprobantepres';
                $this->load->view('layouts/main',$data);
                
            }else{
                
                $data['registro'] = $this->Registro_model->get_comprobante($registro_id);
                $data['empresa'] = $this->Empresa_model->get_empresa(1);

                $data['_view'] = 'registro/comprobantedev';
                $this->load->view('layouts/main',$data);
            }
            
        
        }else {
            redirect('', 'refresh');
        }
        
        
    }    
    
    function get_detalle_registro2(){
        if ($this->input->is_ajax_request()){
            $detregistro_id = $this->input->post("detregistro_id");
            echo json_encode($this->Registro_model->get_detalle_registro2($detregistro_id));
        }
    }
    function guardar_arma($detregistro_id){
        // if(isset($_POST) && count($_POST) > 0){ 
            $registro = $this->Registro_model->get_detalle_registro2($detregistro_id);
            $params = array(
                'detregistro_observacion' => $this->input->post('modal_observaciones'),
                'detregistro_devuelto' => $this->input->post('modal_devuelto'),
                'detregistro_fechadevolucion' => date('Y-m-d'),
                'detregistro_horadevolucion' => date('H:i:s'),
                'estado_id' => 6,
            );
            if (!empty($_FILES['modal_foto1']['name'])){
                $params2 = array(
                    'imagen_descripcion' => $this->crear_imagen_arma('modal_foto1'),
                    'detregistro_id' => $detregistro_id,
                );
                $this->Registro_model->add_imagen($params2);
            }
            if (!empty($_FILES['modal_foto2']['name'])){
                $params3 = array(
                    'imagen_descripcion' => $this->crear_imagen_arma('modal_foto2'),
                    'detregistro_id' => $detregistro_id,
                );
                $this->Registro_model->add_imagen($params3);
            }
            if (!empty($_FILES['modal_foto3']['name'])){
                $params5 = array(
                    'imagen_descripcion' => $this->crear_imagen_arma('modal_foto3'),
                    'detregistro_id' => $detregistro_id,
                );
                $this->Registro_model->add_imagen($params5);
            }

            $this->Registro_model->update_detregistro($detregistro_id,$params);
            $this->comprobantedev($registro[0]['registro_id']);
        // }
    }

    function crear_imagen_arma($campo,$detregistro_id=""){
        if($detregistro_id != ""){

        }else{

        }
        
        $foto="";
        if (!empty($_FILES["$campo"]['name'])){
            $this->load->library('image_lib');
            $config['upload_path'] = './resources/images/arma/fotos/';
            $img_full_path = $config['upload_path'];

            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['max_size'] = 200000;
            $config['max_width'] = 2900;
            $config['max_height'] = 2900;
            
            $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
            $config['file_name'] = $new_name; //.$extencion;
            $config['file_ext_tolower'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload("$campo");

            $img_data = $this->upload->data();
            $extension = $img_data['file_ext'];
            /* ********************INICIO para resize***************************** */
            if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                $conf['image_library'] = 'gd2';
                $conf['source_image'] = $img_data['full_path'];
                $conf['new_image'] = './resources/images/arma/fotos/';
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
            $confi['source_image'] = './resources/images/arma/fotos/'.$new_name.$extension;
            $confi['new_image'] = './resources/images/arma/fotos/'."thumb_".$new_name.$extension;
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
        return $foto;
    }
    function guardar_fotos(){
        if($this->input->is_ajax_request()){
            $detregistro_id = $this->input->post('detregistro_id');
            $config = [
                "upload_path" => "./resources/images/arma/fotos",
                "allowed_types" => "png|jpg|jpeg|gif"
            ];

            $this->load->library("upload", $config);
            $fotos = ['modal2_foto1','modal2_foto2','modal2_foto3'];
            for ($i=0; $i < sizeof($fotos); $i++) { 
                if($this->upload->do_upload($fotos[$i])){
                    $data = array("upload_data" => $this->upload->data());
                    $params2 = array(
                        'imagen_descripcion' => $data['upload_data']['file_name'],
                        'detregistro_id' => $detregistro_id,
                    );
                    $this->Registro_model->add_imagen($params2);
                }else{
                    echo $this->upload->display_errors();
                }
            }
        }
    }
}
