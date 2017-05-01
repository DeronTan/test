<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model{
    public function get_all_user(){//获取表内所有未删除的值
        $this->db->select('*');//查询全部
        $this->db->from('t_user');//从那一张表
        $this->db->order_by('user_id','desc');
        return $this->db->get()->result();//获取返回结果，一跳用row多条用result
    }
    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->where('user_id',$id);
        return $this->db->get()->row();
    }
    public function save_user($data)
    {
        if($data["user_id"]){
            $this->db->where('user_id', $data["user_id"]);
            $this->db->update('t_user', $data);
        }else{
            $this -> db -> insert('t_user',$data);
        }
        return $this -> db -> affected_rows();
    }
    public function do_login($name,$password)
    {
        $query = $this->db->get_where("t_user",array("username" => $name, "password" => $password));
        return $query->row();
    }
}
?> 