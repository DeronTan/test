<?php 
	class User_model extends CI_Model{
		public function do_login($tel,$pass)
		{
			 $query = $this->db->get_where("t_user",array("tel" => $tel, "password" => $pass));
            return $query->row();
		}
		public function save_user($data)
	    {
	        $this -> db -> insert('t_user',$data);
	        $this->db->select('*');
	        $this->db->from('t_user');
	        $this->db->order_by('user_id','desc');
	        $this->db->limit(1,0);
	        return $this->db->get()->row();
	    }
	}
?>