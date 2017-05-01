<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Path_model extends CI_Model{
    public function get_all_path(){
        $this->db->select('*');
        $this->db->from('t_path');
        return $this->db->get()->result();
    }
    public function del_path_by_id($id)
    {
        $query=$this->db->delete('t_path',array('path_id' => $id));
        return $query;
    }
    public function del_some_by_id($arr){

    	 $this->db->where_in('path_id',$arr);
        $query = $this->db->delete('t_path');

        return $this->db->affected_rows();
    }
    public function get_path_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_path');
        $this->db->where('spot_id',$id);
        return $this->db->get()->result();
    }
    public function save_path($data)
    {
         if($data["path_id"]){
            $this->db->where('path_id', $data["path_id"]);
            $this->db->update('t_path', $data);
        }else{
            $this -> db -> insert('t_path',$data);
        }
        return $this -> db -> affected_rows();
    }
}
?>