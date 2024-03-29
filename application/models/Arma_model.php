<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Arma_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get arma by arma_id
     */
    function get_arma($arma_id)
    {
        $arma = $this->db->query("
            SELECT
                *

            FROM
                `arma`

            WHERE
                `arma_id` = ?
        ",array($arma_id))->row_array();

        return $arma;
    }
        
    /*
     * Get all arma
     */
    function get_all_arma()
    {
        $arma = $this->db->query("
            SELECT
                a.*, p.persona_nombre, p.persona_apellido, t.tipoarma_descripcion,
                u.usuario_nombre, e.estado_color, e.estado_descripcion
            FROM
                arma a
            left join tipo_arma t on a.tipoarma_id = t.tipoarma_id
            LEFT JOIN persona p on a.persona_id = p.persona_id
            LEFT JOIN usuario u on a.usuario_id = u.usuario_id
            LEFT JOIN estado e on a.estado_id = e.estado_id
            WHERE
                1 = 1
            ORDER BY a.`arma_id` DESC
        ")->result_array();
        return $arma;
    }

    /*
     * Get all arma
     */
    function get_all_inventario()
    {
        $arma = $this->db->query("
            SELECT
                a.*, p.persona_nombre, p.persona_apellido, t.tipoarma_descripcion,
                u.usuario_nombre, e.estado_color, e.estado_descripcion
            FROM
                arma a
            left join tipo_arma t on a.tipoarma_id = t.tipoarma_id
            LEFT JOIN persona p on a.persona_id = p.persona_id
            LEFT JOIN usuario u on a.usuario_id = u.usuario_id
            LEFT JOIN estado e on a.estado_id = e.estado_id
            WHERE
                1 = 1
            ORDER BY a.`arma_id` DESC
        ")->result_array();
        return $arma;
    }
        
    /*
     * Get all arma
     */
    function get_all_prestamos_activos()
    {
        
        $sql = "select p.*, u.usuario_nombre,r.registro_id, r.registro_fechasalida, r.registro_horasalida,
                e.estado_descripcion
                from registro r
                left join persona p on p.persona_id = r.persona_id
                left join usuario u on u.usuario_id = r.usuario_id
                left join estado e on e.estado_id = r.estado_id
                where r.estado_id = 5";
        
        $arma = $this->db->query($sql)->result_array();
        return $arma;
    }
        
    /*
     * function to add new arma
     */
    function add_arma($params)
    {
        $this->db->insert('arma',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update arma
     */
    function update_arma($arma_id,$params)
    {
        $this->db->where('arma_id',$arma_id);
        return $this->db->update('arma',$params);
    }
    
    /*
     * function to delete arma
     */
    function delete_arma($arma_id)
    {
        return $this->db->delete('arma',array('arma_id'=>$arma_id));
    }
    /*
     * Get arma por codigo
     */
    function getarma_porcodigo($codigo)
    {
        $arma = $this->db->query("
            SELECT
                a.*, p.persona_nombre, p.persona_apellido, t.tipoarma_descripcion,
                u.usuario_nombre, e.estado_color, e.estado_descripcion, g.grado_descripcion
            FROM
                inventario a
            left join tipo_arma t on a.tipoarma_id = t.tipoarma_id
            LEFT JOIN persona p on a.persona_id = p.persona_id
            LEFT JOIN usuario u on a.usuario_id = u.usuario_id
            LEFT JOIN estado e on a.estado_id = e.estado_id
            LEFT JOIN grado_persona g on p.grado_id = g.grado_id
            WHERE
                a.arma_codigo = '".$codigo."'
                and a.estado_id <> 13 
            ORDER BY a.`arma_id` DESC
        ")->result_array();
        return $arma;
    }
    /*
     * Get armas de una persona
     */
    function getarmas_porpersona($persona_id)
    {
        $arma = $this->db->query("
            SELECT
                a.*, p.persona_nombre, p.persona_apellido, t.tipoarma_descripcion,
                u.usuario_nombre, e.estado_color, e.estado_descripcion, g.grado_descripcion
            FROM
                arma a
            left join tipo_arma t on a.tipoarma_id = t.tipoarma_id
            LEFT JOIN persona p on a.persona_id = p.persona_id
            LEFT JOIN usuario u on a.usuario_id = u.usuario_id
            LEFT JOIN estado e on a.estado_id = e.estado_id
            LEFT JOIN grado_persona g on p.grado_id = g.grado_id
            WHERE
                a.persona_id = '".$persona_id."'
                and a.estado_id <> 13 
            ORDER BY a.`arma_id` DESC
        ")->result_array();
        return $arma;
    }
    
    /*
     * Get arma por codigo
     */
    function busquedaarma_porpersona($filtro)
    {
        $arma = $this->db->query("
            SELECT
                a.*, p.persona_nombre, p.persona_apellido, t.tipoarma_descripcion,
                u.usuario_nombre, e.estado_color, e.estado_descripcion, g.grado_descripcion
            FROM
                inventario a
            left join tipo_arma t on a.tipoarma_id = t.tipoarma_id
            LEFT JOIN persona p on a.persona_id = p.persona_id
            LEFT JOIN usuario u on a.usuario_id = u.usuario_id
            LEFT JOIN estado e on a.estado_id = e.estado_id
            LEFT JOIN grado_persona g on p.grado_id = g.grado_id
            WHERE
                a.estado_id <> 13 
                and (p.persona_nombre like '%".$filtro."%' or p.persona_apellido like '%".$filtro."%' or p.persona_ci like '%".$filtro."%')
            ORDER BY a.`arma_id` DESC
        ")->result_array();
        return $arma;
    }
    
    /*
     * Get armas de una persona
     */
    function get_prestamos_fecha($fecha)
    {
        $sql = "select p.persona_nombre, p.persona_apellido, p.persona_ci, p.persona_telefono, p.persona_celular,
                r.*, e.estado_descripcion, a.*, t.tipoarma_descripcion, g.grado_descripcion,
                d.detregistro_fechadevolucion, d.detregistro_horadevolucion
                from registro r

                left join persona p on p.persona_id = r.persona_id
                left join usuario u on u.usuario_id = r.usuario_id
                left join estado e on e.estado_id = r.estado_id
                left join detalle_registro d on d.registro_id = r.registro_id
                left join arma a on a.arma_id = d.arma_id
                left join tipo_arma t on t.tipoarma_id = a.tipoarma_id
                left join grado_persona g on g.grado_id = p.grado_id


                where 
                r.registro_fechasalida = '".$fecha."'
                order by r.registro_fechasalida,r.registro_horasalida asc";
        
        $arma = $this->db->query($sql)->result_array();
        return $arma;
    }
    
    /*
     * Verificar arma por codigo en detalle_registro_aux
     */
    function verificar_arma_enaux($arma_id)
    {
        $arma = $this->db->query("
            SELECT
                dra.arma_id
            FROM
                detalle_registro_aux dra
            WHERE
                dra.arma_id = $arma_id
        ")->result_array();
        return $arma;
    }
    
}
