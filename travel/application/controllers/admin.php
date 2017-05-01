<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class admin extends CI_Controller {
		public function index()//查询admin表并返回值给admin.php
		{
			if (!$this->session->admin) {
			    redirect('admin/login');
			}else{
			$this->load->model("admin_model");
			$result = $this->admin_model->get_admin_all();
			$arr = array(
					'blogs'=>$result
				);
			if ($result) {
				$this->load->view('admin',$arr);
			}else{
				$this->load->view('admin');
				echo "查询失败";
			}}
		}
		public function login()//跳转登录页
		{
			$this->load->view('login');
		}
		public function do_login(){//登录并把登录信息存到session
			$name = $this->input->post('name');
			$password = $this->input->post('password');
	        $this->load->model("admin_model");
			$this->admin_model->do_login($name,$password);
        	$result = $this->admin_model->do_login($name,$password);
	        $admin=$result;
        	
			$arr = $arrayName = array(
				'admin' =>$admin
				);
			if($result){
	            $this->session->set_userdata($arr);
	            redirect("notice/index");	//控制器下方法,首页

	        }else{
	            echo "error";
	        }

		}
		public function del_admin()//删除管理员
		{
      		$id = $this->uri->segment(3);
      		$this->load->model('admin_model');
      		$result = $this->admin_model->del_admin($id);
      		if ($result) {
      			redirect("admin/index");
      			echo "<script>alert('删除成功')</script>";
      		}else{
      			echo "<script>alert('删除失败，请重新删除')</script>";
      			redirect("admin/index");
      		}

		}
		public function add_admin()
		{
			$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3072;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('portrait');
        $upload_data = $this -> upload -> data();

        $tmp_portrait = $this->input->post("tmp_portrait");
        if ($upload_data['file_size'] > 0 ) {
            $photo_url = 'img/'.$upload_data['file_name'];
        }else if($tmp_portrait){
            $photo_url = $tmp_portrait;
        }else{
            //如果不上传图片,则使用默认图片
            $photo_url = 'img/head-default.png';
        }
        // var_dump($upload_data);
       // die();
        $admin_id = $this-> input ->post('id');
        $real_name = $this-> input ->post('real_name');
        $name = $this-> input ->post('name');
        $password = $this-> input ->post('password');
        $tel = $this-> input ->post('tel');
        $this->load->model("admin_model");
        $row = $this-> admin_model ->save_admin(array(
            "admin_id" => $admin_id,
            "admin_name" => $name,
            "password" => $password,
            "admin_img" => $photo_url,
            'real_name' => $real_name,
            "telephone" =>$tel
        ));
        redirect('admin/index');
		}
	}
?>