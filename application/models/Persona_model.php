<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Persona_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get persona by persona_id
     */
    function get_persona($persona_id)
    {
        $persona = $this->db->query("
            SELECT
                *

            FROM
                `persona`

            WHERE
                `persona_id` = ?
        ",array($persona_id))->row_array();

        return $persona;
    }
        
    /*
     * Get all persona
     */
    function get_all_persona()
    {
        $persona = $this->db->query(
            "SELECT p.*, e.estado_descripcion, e.estado_color, tp.tipo_descripcion, gp.grado_descripcion 
            from persona p 
            left join estado e on p.estado_id = e.estado_id 
            left join tipo_persona tp on p.tipo_id = tp.tipo_id 
            left join grado_persona gp on p.grado_id  = gp.grado_id 
            where 1=1
            order by p.persona_id desc 
            ")->result_array();

        return $persona;
    }
        
    /*
     * function to add new persona
     */
    function add_persona($params)
    {
        $this->db->insert('persona',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update persona
     */
    function update_persona($persona_id,$params)
    {
        $this->db->where('persona_id',$persona_id);
        return $this->db->update('persona',$params);
    }
    
    /*
     * function to delete persona
     */
    function delete_persona($persona_id)
    {
        return $this->db->delete('persona',array('persona_id'=>$persona_id));
    }
    
    function get_all_persona_activa()
    {
        $persona = $this->db->query("
            SELECT
                *
            FROM
                `persona`
            WHERE
                estado_id = 1
            ORDER BY `persona_apellido` ASC, `persona_nombre` ASC
        ")->result_array();

        return $persona;
    }

    function buscar_personas($parametro){
        return $this->db->query(
            "SELECT p.*, a.arma_codigo
            from persona p
            left join arma a on p.persona_id = a.persona_id 
            where 
            p.persona_nombre like '%$parametro%'
            or p.persona_apellido like '%$parametro%'
            or a.arma_codigo like '%$parametro%'"
        )->result_array();
    }
    /* busca personas por: nombre, apellido o c.i. */
    function buscar_personasparametro($filtro)
    {
        $persona = $this->db->query(
        "SELECT p.*, g.grado_descripcion, t.tipo_descripcion
            FROM persona p
            left join grado_persona g on p.grado_id = g.grado_id
            left join tipo_persona t on p.tipo_id = t.tipo_id
            WHERE
                p.estado_id = 1 and
                (p.persona_nombre like '%".$filtro."%' or p.persona_apellido like '%".$filtro."%' or p.persona_ci like '%".$filtro."%')
            order by p.persona_apellido asc, p.persona_nombre asc
        ")->result_array();
        return $persona;
    }

    function get_info_persona($ci){
        return $this->db->query(
            "SELECT p.*, tp.tipo_descripcion ,gp.grado_descripcion, e.estado_descripcion 
            from persona p 
            left join tipo_persona tp on p.tipo_id = tp.tipo_id
            left join grado_persona gp ON gp.grado_id = p.grado_id 
            left join estado e on p.estado_id = e.estado_id 
            where 1 = 1
            and p.persona_ci = $ci"
        )->row_array();
    }
}
