<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hostel_model extends CI_Model{
    public function get_all_hostel(){
        $this->db->select('*');
        $this->db->from('t_hostel');
        $this->db->join('t_spot','t_spot.spot_id=t_hostel.spot_id');
        return $this->db->get()->result();
    }
     public function get_hostel(){
        $this->db->select('*');
        $this->db->from('t_hostel');
        $this->db->order_by('hostel_id','desc');
        $this->db->limit(3,0);
        return $this->db->get()->result();
    }
    public function del_hostel_by_id($id)
    {
        $query=$this->db->delete('t_hostel',array('hostel_id' => $id));
        return $query;
    }
    public function get_hostel_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_hostel');
        $this->db->where('spot_id',$id);
        return $this->db->get()->result();
    }
    public function save_hostel($data)
    {
        if($data["hostel_id"]){
            $this->db->where('hostel_id', $data["hostel_id"]);
            $this->db->update('t_hostel', $data);
        }else{
            $this -> db -> insert('t_hostel',$data);
        }
        return $this -> db -> affected_rows();
    }
}
?>