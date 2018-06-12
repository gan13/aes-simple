<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{
  function save_data($data_input, $table_name)
	{
		$this->db->insert( $table_name, $data_input );
		return $this->db->insert_id();
	}
		
  function update_data($data_update, $where, $table_name)
	{
		$this->db->where($where);
		$this->db->update($table_name, $data_update);
	}
	
	public function json_all_profil($where, $fields, $order_by) {
		$this->db->select("
		$fields
		");
    $this->db->where($where);
		$this->db->order_by($order_by);
		$result = $this->db->get('users');
		return $result->result_array();
    }
    
}
