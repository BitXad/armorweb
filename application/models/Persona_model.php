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
}
