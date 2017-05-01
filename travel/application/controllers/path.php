<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Path extends CI_Controller {
    public function index(){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
    	$this->load->model('path_model');
    	$datas = $this->path_model->get_all_path();
    	$arr['datas']=$datas;
        $this->load->model('spot_model');
        $row = $this->spot_model->get_all_spot();
        $arr['row'] = $row; 
    	if ($datas) {
    		$this->load->view('path',$arr);
    	}}
    }
    public function delect_path_by_id()
    {
    	$id = $this->uri->segment('3');
    	$this->load->model('path_model');
    	$datas = $this->path_model->del_path_by_id($id);
    	if($id){
    		// $this->load->view("path");
            redirect('path');
    	}else{
    		echo '删除失败';
    	}
    }
    public function save_path()
    {
        $id = $this->input->post('id');
        $spot_id = $this->input->post('deve');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $this->load->model('path_model');
        $content = $this->input->post('content');
        $row = $this -> path_model -> save_path(array(
            'path_id'=>$id,
            "star" => $start,
            "end" => $end,
            "path_content" => $content,
            'spot_id'=>$spot_id,
        ));
        redirect('path');
    }
}
?>
