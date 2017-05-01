<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class notice_model extends CI_Model{
    public function get_all(){
        // $sql = "select * from t_notice";
        return $this->db->get('t_notice')->result(); 
    }
     public function get_all_count(){
        $this->db->select('*');
        $this->db->from('t_notice');
        return $number=$this->db->count_all_results();
    }
    public function get_new_notice(){
        $this->db->select('*');
        $this->db->from('t_notice');
        $this->db->order_by('addtime','desc');
        $this->db->limit(3,0);
        $query=$this->db->get();
        return $query->result();
    }
    public function get_by_page($limit=7,$offset=0){
        $this->db->select('*');
        $this->db->from('t_notice');
        $this->db->order_by('addtime','desc');
        $this->db->limit($limit,$offset);
        $query=$this->db->get();
        return $query->result();

    }
    public function del_notice($id){
        $query = $this->db->delete('t_notice',array('notice_id' => $id));
        return $query;
    }
    public function save_notice($row){
        $this -> db -> insert("t_notice", $row);
        return $this->db->affected_rows();
    }
}