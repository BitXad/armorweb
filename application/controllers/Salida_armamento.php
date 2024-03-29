<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Salida_armamento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Salida_armamento_model');
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
        $data['registro'] = $this->Salida_armamento_model->get_all_registro();
        
        $data['_view'] = 'salida_armamento/index';
        $this->load->view('layouts/main',$data);
    }
    
    function buscar_porcodigo()  
    {
        $codigo = $this->input->post('codigo');
        $this->load->model('Arma_model');
        $arma = $this->Arma_model->getarma_porcodigo($codigo);
        $usuario_id = $this->session_data['usuario_id'];
        if(sizeof($arma)>0){
            $elarma_enaux = $this->Arma_model->verificar_arma_enaux($arma[0]['arma_id']);
            if(sizeof($elarma_enaux)>0){
                $datos=array("res" => "yahay", "persona_id" => 0);
                echo json_encode($datos);
            }else{
                $lapersona_id = $arma[0]['persona_id'];
                if($lapersona_id > 0){
                    $persona_id = $arma[0]['persona_id'];
                }else{
                    $persona_id = 0;
                }
                /*    $armas = $this->Arma_model->getarmas_porpersona($persona_id);
                    foreach ($armas as $elarma) {
                        /*$verificar = $this->Salida_armamento_model->verificar_salida($elarma['arma_id']);
                        if(!($verificar["detregistro_id"] > 0)){
                            $verificaraux = $this->Salida_armamento_model->verificar_salidaaux($elarma['arma_id']);
                            if(!($verificaraux["detregistro_id"] > 0)){*/
                           /*     $params = array(
                                    'arma_id' => $elarma['arma_id'],
                                    'usuario_id' => $usuario_id,
                                    'estado_id' => 5,
                                    'detregistro_observacion' => $elarma['arma_novedades'],
                                );
                                $detregistro_id = $this->Salida_armamento_model->add_detalle_registro_aux($params);
                           /* }
                        }*/
                   /* }
                    $datos=array("res" => "ok", "persona_id" => $persona_id);
                    echo json_encode($datos);
                    //echo json_encode("ok"); 
                }else{
                    foreach ($arma as $elarma) {*/
                        /*$verificar = $this->Salida_armamento_model->verificar_salida($elarma['arma_id']);
                        if(!($verificar["detregistro_id"] > 0)){
                            $verificaraux = $this->Salida_armamento_model->verificar_salidaaux($elarma['arma_id']);
                            if(!($verificaraux["detregistro_id"] > 0)){*/
                                $params = array(
                                    'arma_id' => $arma[0]['arma_id'],
                                    'usuario_id' => $usuario_id,
                                    'estado_id' => 5,
                                    'detregistro_observacion' => $arma[0]['arma_novedades'],
                                );
                                $detregistro_id = $this->Salida_armamento_model->add_detalle_registro_aux($params);
                           /* }
                        }*/
                    /*}
                    $datos=array("res" => "ok", "persona_id" => 0);
                    echo json_encode($datos);
                }*/
                $datos=array("res" => "ok", "persona_id" => $persona_id);
                echo json_encode($datos);
            }
        }else{
            $datos=array("res" => "no", "persona_id" => 0);
            echo json_encode($datos);
        }
    }
    /* obtiene lo que tiene detalle_registro_aux  dado un determinado usuario */
    function get_detalle_aux(){
        $usuario_id = $this->session_data['usuario_id'];
        $resultado = $this->Salida_armamento_model->get_all_detalleregistro_aux($usuario_id);
        echo json_encode($resultado);
    }
    /* obtiene lo que tiene detalle_registro_aux  dado un determinado usuario */
    function quitartodo_deaux(){
        $usuario_id = $this->session_data['usuario_id'];
        $this->Salida_armamento_model->delete_detalleregistro_aux($usuario_id);
        echo json_encode("ok");
    }
    /* obtiene lo que tiene detalle_registro_aux  dado un determinado usuario */
    function quitardetalle_deaux(){
        $detregistro_id = $this->input->post('detregistro_id');
        $this->Salida_armamento_model->delete_undetalleregistro_aux($detregistro_id);
        echo json_encode("ok");
    }
    /* registra una salida */
    function registrar_salida(){
        $this->load->model('Registro_model');
        $usuario_id = $this->session_data['usuario_id'];
        $persona_id = $this->input->post('persona_id');
        $resultados = $this->Salida_armamento_model->get_all_detalleregistro_aux($usuario_id);
        if(sizeof($resultados) >0 ){
            $fecha_salida = date('Y-m-d');
            $hora_salida  = date('H:i:s');
            $estado_id = 5;
            $params = array(
                'persona_id' => $persona_id,
                'usuario_id' => $usuario_id,
                'estado_id' => $estado_id,
                'registro_fechasalida' => $fecha_salida,
                'registro_horasalida' => $hora_salida,
                //'registro_observacion' => $this->input->post('registro_observacion'),
            );
            $registro_id = $this->Registro_model->add_registro($params);
            foreach ($resultados as $resultado) {
                $params = array(
                    'registro_id' => $registro_id,
                    'arma_id' => $resultado['arma_id'],
                    'estado_id' => 5,
                    'detregistro_observacion' => $resultado['detregistro_observacion'],
                );
                $detregistro_id = $this->Salida_armamento_model->add_detalle_registro($params);
            }
            $this->Salida_armamento_model->delete_detalleregistro_aux($usuario_id);
            echo json_encode($registro_id);
        }else{
            echo json_encode("no");
        }
    }
    /* obtiene lo que tiene detalle_registro_aux  dado un determinado usuario */
    function obtener_persona(){
        $persona_id = $this->input->post('persona_id');
        $datos = $this->Salida_armamento_model->get_persona($persona_id);
        echo json_encode($datos);
    }
    /* registra observaciones de cada detalle al hacer la salida!.. */
    function registrar_observacion(){
        $detregistro_id = $this->input->post('detregistro_id');
        $laobservacion = $this->input->post('laobservacion');
        $params = array(
            'detregistro_observacion' => $laobservacion,
        );
        $this->Salida_armamento_model->update_detalleregistro_aux($detregistro_id, $params);
        echo json_encode("ok");
    }
    /* busca armas por persona */
    function buscar_porpersona()  
    {
        $filtrar = $this->input->post('filtrar');
        $this->load->model('Arma_model');
        $arma = $this->Arma_model->busquedaarma_porpersona($filtrar);
        if(sizeof($arma)>0){
            echo json_encode($arma);
        }else{
            echo json_encode("no");
        }
    }
    
    
    function registrar_enaux()  
    {
        $eldetalle = $this->input->post('eldetalle');
        $usuario_id = $this->session_data['usuario_id'];
        $this->load->model('Arma_model');
        $elarma_enaux = $this->Arma_model->verificar_arma_enaux($eldetalle['arma_id']);
        if(sizeof($elarma_enaux)>0){
            echo json_encode("no");
        }else{
            $params = array(
                'arma_id' => $eldetalle['arma_id'],
                'usuario_id' => $usuario_id,
                'estado_id' => 5,
                'detregistro_observacion' => $eldetalle['arma_novedades'],
            );
            $detregistro_id = $this->Salida_armamento_model->add_detalle_registro_aux($params);
            echo json_encode("ok");
        }
    }
}
