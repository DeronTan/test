<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_model extends CI_Model{
	public function get_train_order($id)
	{
		$this->db->select('*');
		$this->db->from('t_order');
		$this->db->where('user_id',$id);
		$this->db->where('order_hostel',null);
		return $this->db->get()->result();
	}
	public function get_hostel_order($id)
	{
		$this->db->select('*');
		$this->db->from('t_order');
		$this->db->join('t_hostel','t_order.order_hostel=t_hostel.hostel_id');
		$this->db->where('user_id',$id);
		$this->db->where('order_start',null);
		$this->db->where('order_end',null);
		return $this->db->get()->result();
	}
	public function add_order($data)
	{
        $this -> db -> insert('t_order',$data);
		
	}
}