<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//进行数据库的处理，增删改->sql语句
class Foods_model extends CI_Model{
    public function get_all_food(){//获取t_foot表的所有数据
        // $sql = "select * from t_message,t_user where t_message.sender = t_user.user_id";
        $this->db->select('*');
        $this->db->from('t_food');
        $this->db->join('t_spot','t_food.address=t_spot.spot_id');//多表链接，'t_food.address=t_spot.spot_id'链接条件，t_spot链接到那个表
        return $this->db->get()->result();//返回结果
        //result->返回多条数据，row()返回一条

    }
    public function get_food(){
        $this->db->select('*');
        $this->db->from('t_food');
        $this->db->order_by('food_id','desc');
        $this->db->limit(3,0);
        return $this->db->get()->result();
    }
    public function del_food_by_id($id)
    {
        $query = $this->db->delete('t_food',array('food_id' => $id));
        return $query;
    }
    public function save_food($data)
    {
        if($data["food_id"]){
            $this->db->where('food_id', $data["food_id"]);
            $this->db->update('t_food', $data);
        }else{
            $this -> db -> insert('t_food',$data);
        }
        return $this -> db -> affected_rows();
    }
    public function get_food_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_food');
        $this->db->where('address',$id);
        return $this->db->get()->result();
    }
}
?>