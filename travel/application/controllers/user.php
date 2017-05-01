<?php
// defined('BASEspot') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function index(){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
    	$this->load->model('user_model');
    	$datas = $this->user_model->get_all_user();
    	$arr['datas']=$datas;
    	if ($datas) {
    		$this->load->view('user',$arr);
    	}}
    }
    public function add_user($value='')
    {
        $this->load->model('user_model');
       /*文件上传*/
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

        $user_id = $this->input->post("id");
        // echo $user_id;die();
        $username = $this->input->post('name');
        $password = $this->input->post('pass');
        $tel = $this->input->post('tel');
        $email = $this->input->post('email');
        $sex = $this->input->post('sex');
        $row = $this -> user_model -> save_user(array(
            'user_id'=>$user_id,
            "username" => $username,
            "password" => $password,
            "tel" => $tel,
            "email" => $email,
            "sex" => $sex,
            "portrait" => $photo_url,
        ));
        redirect('user');
    }
        public function login()
        {
            $name = $this->input->post('name');
            $pass = $this->input->post('password');
            $this->load->model('user_model');
            $result = $this->user_model->do_login($name,$pass);
            $arr['user']=$result;
            if($result){
                $this->session->set_userdata($arr);
                redirect('welcome');
            }else{
                echo '密码错误';
            }
        }
        public function registered()
        {
           $this->load->view('registered');
        }
    }

?>
