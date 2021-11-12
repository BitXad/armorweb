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
        $sql = "
                select * 
                from registro r,arma a, persona p, tipo_arma t, usuario u, estado e
                where
                r.persona_id = p.persona_id and
                r.arma_id = a.arma_id and
                t.tipoarma_id = a.tipoarma_id and
                u.usuario_id = r.usuario_id and
                e.estado_id = r.estado_id and
                r.estado_id = 5";
        
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
                u.usuario_nombre, e.estado_color, e.estado_descripcion
            FROM
                arma a
            left join tipo_arma t on a.tipoarma_id = t.tipoarma_id
            LEFT JOIN persona p on a.persona_id = p.persona_id
            LEFT JOIN usuario u on a.usuario_id = u.usuario_id
            LEFT JOIN estado e on a.estado_id = e.estado_id
            WHERE
                a.arma_codigo = '".$codigo."'
                and a.estado_id <> 13 
            ORDER BY a.`arma_id` DESC
        ")->result_array();
        return $arma;
    }
}
