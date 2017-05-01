<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class spot_model extends CI_Model{
    public function get_all_spot(){
        $this->db->select('*');
        $this->db->from('t_spot');
        $this->db->where('is_delete', 0);
        return $this->db->get()->result();
    }
    public function get_spot(){
        $this->db->select('*');
        $this->db->from('t_spot');
        $this->db->order_by('spot_id','desc');
        $this->db->limit(3,0);
        return $this->db->get()->result();
    }
    public function save_spot($data)
    {
        if($data["spot_id"]){
            $this->db->where('spot_id', $data["spot_id"]);
            $this->db->update('t_spot', $data);
        }else{
            $this -> db -> insert('t_spot',$data);
        }
        return $this -> db -> affected_rows();
    }
    public function del_spot_by_id($id)
    {
        $this->db->where('spot_id', $id);
        $this->db->update('t_spot', array('is_delete' => 1));
        return $this->db->affected_rows();
    }
    public function get_spot_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_spot');
        $this->db->where('spot_id',$id);
        return $this->db->get()->row();
    }
}
?>