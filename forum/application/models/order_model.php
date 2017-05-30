<?php 
	class Order_model extends CI_Model{
		public function del_order_by_id($id)
	    {
	        return $this->db->delete('t_order',array('order_id' => $id));
	    }
	    public function get_order_by_userid($id)
	    {
	        $this->db->select('*');
	        $this->db->from('t_order');
	        $this->db->join('t_user','t_user.user_id=t_order.user_id');
	        $this->db->join('t_goods','t_goods.goods_id=t_order.goods_id');
	        $this->db->where('t_order.user_id',$id);
	        return $this->db->get()->result();
	    }
	    public function save_order($data)
	    {
	        $this -> db -> insert('t_order',$data);
	        return $this -> db -> affected_rows();
	    }
	}
?>