<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_arma_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tipo_arma by tipoarma_id
     */
    function get_tipo_arma($tipoarma_id)
    {
        $tipo_arma = $this->db->query("
            SELECT
                *

            FROM
                `tipo_arma`

            WHERE
                `tipoarma_id` = ?
        ",array($tipoarma_id))->row_array();

        return $tipo_arma;
    }
        
    /*
     * Get all tipo_arma
     */
    function get_all_tipo_arma()
    {
        $tipo_arma = $this->db->query("
            SELECT
                *

            FROM
                `tipo_arma`

            WHERE
                1 = 1

            ORDER BY `tipoarma_id` DESC
        ")->result_array();

        return $tipo_arma;
    }
        
    /*
     * function to add new tipo_arma
     */
    function add_tipo_arma($params)
    {
        $this->db->insert('tipo_arma',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tipo_arma
     */
    function update_tipo_arma($tipoarma_id,$params)
    {
        $this->db->where('tipoarma_id',$tipoarma_id);
        return $this->db->update('tipo_arma',$params);
    }
    
    /*
     * function to delete tipo_arma
     */
    function delete_tipo_arma($tipoarma_id)
    {
        return $this->db->delete('tipo_arma',array('tipoarma_id'=>$tipoarma_id));
    }
}