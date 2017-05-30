<?php 
	class Love_model extends CI_Model{
		public function get_love_all()
		{
			$this->db->select('*');
	        $this->db->from('t_love');
	        $this->db->join('t_user','t_user.user_id=t_love.user_id');
	        return $this->db->get()->result();
		}
		public function get_love_index()
		{
			$this->db->select('*');
	        $this->db->from('t_love');
	        $this->db->order_by('love_id','desc');
	        $this->db->join('t_user','t_user.user_id=t_love.user_id');
	        $this->db->limit(3,0);
	        return $this->db->get()->result();
		}
		public function del_love_by_id($id)
	    {
	        return $this->db->delete('t_love',array('love_id' => $id));
	    }
	    public function get_love_by_userid($id)
	    {
	        $this->db->select('*');
	        $this->db->from('t_love');
	        $this->db->where('user_id',$id);
	        return $this->db->get()->result();
	    }
	    public function save_love($data)
	    {
	    	$this -> db -> insert('t_love',$data);
	        return $this -> db -> affected_rows();
	    }
	}
?>