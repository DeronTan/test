<?php 
	class Goods_model extends CI_Model{
		public function get_goods_all()
		{
			$this->db->select('*');
	        $this->db->from('t_goods');
	        $this->db->join('t_user','t_user.user_id=t_goods.user_id');
	    	$this->db->where('delete', 0);
	        return $this->db->get()->result();
		}
		public function get_goods_index()
		{
			$this->db->select('*');
	        $this->db->from('t_goods');
	        $this->db->join('t_user','t_user.user_id=t_goods.user_id');
	        $this->db->order_by('goods_id','desc');
	    	$this->db->where('delete', 0);
	        $this->db->limit(3,0);
	        return $this->db->get()->result();
		}
		public function del_goods_by_id($id)
	    {
	    	$this->db->where('goods_id', $id);
	        $this->db->update('t_goods', array('delete' => 1));
	        return $this->db->affected_rows();
	    }
	    public function get_goods_by_userid($id)
	    {
	        $this->db->select('*');
	        $this->db->from('t_goods');
	    	$this->db->where('delete', 0);
	        $this->db->where('user_id',$id);
	        return $this->db->get()->result();
	    }
	    public function get_goods_by_id($id)
	    {
	    	$this->db->select('*');
	        $this->db->from('t_goods');
	        $this->db->join('t_user','t_user.user_id=t_goods.user_id');
	        $this->db->where('goods_id',$id);
	        return $this->db->get()->row();
	    }
	    public function save_goods($data)
	    {
            $this -> db -> insert('t_goods',$data);
	        return $this -> db -> affected_rows();
	    }
	}
?>