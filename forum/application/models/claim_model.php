<?php 
	class Claim_model extends CI_Model{
		public function get_claim_all()
		{
			$this->db->select('*');
	        $this->db->from('t_claim');
	        $this->db->join('t_user','t_user.user_id=t_claim.user_id');
	        return $this->db->get()->result();
		}
		public function get_claim_index()
		{
			$this->db->select('*');
	        $this->db->from('t_claim');
	        $this->db->order_by('claim_id','desc');
	        $this->db->join('t_user','t_user.user_id=t_claim.user_id');
	        $this->db->limit(3,0);
	        return $this->db->get()->result();
		}
		public function del_claim_by_id($id)
	    {
	        return $this->db->delete('t_claim',array('claim_id' => $id));
	    }
	    public function get_claim_by_userid($id)
	    {
	        $this->db->select('*');
	        $this->db->from('t_claim');
	        $this->db->where('user_id',$id);
	        return $this->db->get()->result();
	    }
	    public function get_claim_by_id($id)
	    {
	    	$this->db->select('*');
	        $this->db->from('t_claim');
	        $this->db->join('t_user','t_user.user_id=t_claim.user_id');
	        $this->db->where('claim_id',$id);
	        return $this->db->get()->row();
	    }
	    public function save_claim($data)
	    {
            $this -> db -> insert('t_claim',$data);
	        return $this -> db -> affected_rows();
	    }
	}
?>