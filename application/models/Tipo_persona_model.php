<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_persona_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tipo_persona by tipo_id
     */
    function get_tipo_persona($tipo_id)
    {
        $tipo_persona = $this->db->query("
            SELECT
                *

            FROM
                `tipo_persona`

            WHERE
                `tipo_id` = ?
        ",array($tipo_id))->row_array();

        return $tipo_persona;
    }
        
    /*
     * Get all tipo_persona
     */
    function get_all_tipo_persona()
    {
        $tipo_persona = $this->db->query("
            SELECT
                *

            FROM
                `tipo_persona`

            WHERE
                1 = 1

            ORDER BY `tipo_id` DESC
        ")->result_array();

        return $tipo_persona;
    }
        
    /*
     * function to add new tipo_persona
     */
    function add_tipo_persona($params)
    {
        $this->db->insert('tipo_persona',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tipo_persona
     */
    function update_tipo_persona($tipo_id,$params)
    {
        $this->db->where('tipo_id',$tipo_id);
        return $this->db->update('tipo_persona',$params);
    }
    
    /*
     * function to delete tipo_persona
     */
    function delete_tipo_persona($tipo_id)
    {
        return $this->db->delete('tipo_persona',array('tipo_id'=>$tipo_id));
    }
}