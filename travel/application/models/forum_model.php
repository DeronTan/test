<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forum_model extends CI_Model{
    public function get_all_forum(){//获取表内所有未删除的值
        $this->db->select('*');//查询全部
        $this->db->from('t_forum');//从那一张表
        $this->db->join('t_user','t_user.user_id=t_forum.sponsor');//多表查询，加入user表，关联条件是t_user.user_id=t_forum.sponsor
        // $this->db->where('is_delete',0)
        return $this->db->get()->result();//获取返回结果，一跳用row多条用result
    }
    public function get_forum(){
        $this->db->select('*');
        $this->db->from('t_forum');
        $this->db->order_by('forum_id','desc');
        $this->db->limit(1,0);
        return $this->db->get()->row();
    }
    public function get_user_forum($id)
    {
        $this->db->select('*');
        $this->db->from('t_forum');
        $this->db->where('sponsor',$id);
        return $this->db->get()->result();
    }
    public function add_forum($data)
    {
        $this -> db -> insert('t_forum',$data);
    }
    public function add_comment($dta)
    {
        $this -> db -> insert('t_comment',$data);
    }
    public function get_comment($id)
    {
        $this->db->select('*');
        $this->db->from('t_comment');
        $this->db->join('t_user','t_comment.user_id=t_user.user_id');
        $this->db->where('forum_id',$id);
        return $this->db->get()->result();
    }
}
?> 