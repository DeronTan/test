<?php 
	class Admin_model extends CI_Model{
		public function do_login($admin_name,$pass)//密码登录common.php的内容
		{
			 $query = $this->db->get_where("t_admin",array("admin_name" => $admin_name, "password" => $pass));
            return $query->row();
		}
		
		
		//管理员信息更改
		public function get_admin_all()//管理员全部显示
		{
			return $this->db->get("t_admin")->result();
		}
		public function save_admin($data)
	    {
	        if($data["admin_id"]){
	            $this->db->where('admin_id', $data["admin_id"]);
	            $this->db->update('t_admin', $data);
	        }else{
	            $this -> db -> insert('t_admin',$data);
	        }
	        return $this -> db -> affected_rows();
	    }
		public function del_admin($id)//管理员删除
		{
			return $this->db->delete('t_admin',array('admin_id' => $id));
		}
	}
?>