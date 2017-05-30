<?php 
	class Tree_model extends CI_Model{
		public function get_tree_all()
		{
			$this->db->select('*');
	        $this->db->from('t_tree');
	        $this->db->join('t_user','t_user.user_id=t_tree.user_id');
	        return $this->db->get()->result();
		}
		public function get_tree_index()
		{
			$this->db->select('*');
	        $this->db->from('t_tree');
	        $this->db->order_by('tree_id','desc');
	        $this->db->join('t_user','t_user.user_id=t_tree.user_id');
	        $this->db->limit(3,0);
	        return $this->db->get()->result();
		}
		public function del_tree_by_id($id)
	    {
	        return $this->db->delete('t_tree',array('tree_id' => $id));
	    }
	    public function get_tree_by_userid($id)
	    {
	        $this->db->select('*');
	        $this->db->from('t_tree');
	        $this->db->join('t_user','t_user.user_id=t_tree.user_id');
	        $this->db->where('t_tree.user_id',$id);
	        return $this->db->get()->result();
	    }
	    public function save_tree($data)
	    {
	        $this -> db -> insert('t_tree',$data);
	        return $this -> db -> affected_rows();
	    }
	}
?>