<?php
// defined('BASEspot') OR exit('No direct script access allowed');

class Spot extends CI_Controller {
    public function index(){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
    	$this->load->model('spot_model');
    	$datas = $this->spot_model->get_all_spot();
    	$arr['datas']=$datas;
    	if ($datas) {
    		$this->load->view('spot',$arr);
        	}}
    }
    public function delect_spot_by_id()
    {
    	$id = $this->uri->segment('3');
    	$this->load->model('spot_model');
    	$datas = $this->spot_model->del_spot_by_id($id);
    	if($id){
            redirect('spot');
    	}else{
    		echo '删除失败';
    	}
    }
    public function add_spot()
    {
        $this->load->model('spot_model');
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

        $spot_id = $this->input->post("id");
        // echo $spot_id;die();
        $spotname = $this->input->post('name');
        $address = $this->input->post('address');
        $intro = $this->input->post('intro');
        $email = $this->input->post('email');
        $sex = $this->input->post('sex');
        $row = $this -> spot_model -> save_spot(array(
            'spot_id'=>$spot_id,
            "spot_name" => $spotname,
            "spot_address" => $address,
            "spot_intro" => $intro,
            "is_delete" => 0,
            "spot_img" => $photo_url,
        ));
        redirect('spot');
    }
}
?> 
