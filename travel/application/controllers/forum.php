<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
    public function index(){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
    	$this->load->model('forum_model');//获取模板
        $datas = $this->forum_model->get_all_forum();//使用模板内的函数，并传回值
    	$arr['datas']=$datas;
        
    	if ($datas) {
    		$this->load->view('forum',$arr);//加载视图界面
    	}
    }
    }
   
    public function comment()
    {
        $id=$this->input->get('id');
        $this->load->model('forum_model');
        $datas = $this->forum_model->get_comment($id);
        echo json_encode($datas);
    }
} 
?>
