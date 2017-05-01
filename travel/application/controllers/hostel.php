<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel extends CI_Controller {
    public function index(){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
    	$this->load->model('hostel_model');
        $datas = $this->hostel_model->get_all_hostel();
    	$arr['datas']=$datas;
        $this->load->model('spot_model');
        $row = $this->spot_model->get_all_spot();
        $arr['row'] = $row;
    	if ($datas) {
    		$this->load->view('hostel',$arr);
    	}}
    }
    public function delect_hostel_by_id()
    {
    	$id = $this->uri->segment('3');
    	$this->load->model('hostel_model');
    	$datas = $this->hostel_model->del_hostel_by_id($id);
    	if($id){
            redirect('hostel');
    	}else{
    		echo '删除失败';
    	}
    }
    public function add_hostel()
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
        $content = $this-> input ->post('content');
        $hostel_id = $this->input->post("id");

        $name = $this-> input ->post('name');
        $spot_id = $this-> input ->post('deve');
        $address = $this->input->post('address');
        $this->load->model("hostel_model");
        $time = date('Y-m-d H:i:s');
        $row = $this-> hostel_model ->save_hostel(array(
            "hostel_id" => $hostel_id,
            "hostel_name" => $name,
            "hostel_img" => $photo_url,
            'hostel_intro' => $content,
            'spot_id'=> $spot_id,
            'hostel_address' =>$address,
            'hostel_addtime' =>$time
        ));
        redirect('hostel/index');
    }
}
?>
