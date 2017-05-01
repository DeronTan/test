<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

    public function index($offset=0){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
        $this->load->model('notice_model');
        $total_row=$this->notice_model->get_all_count();
        $offset=$this->uri->segment(3);
        $offset=!$offset?0:$offset;
        $this->load->library('pagination');
        $config['base_url']='notice/index/';
        $config['total_rows']=$total_row;
        $config['per_page']=4;
        $config['uri_segment']=3;
        $config['first_link']="首页";
        $config['last_link']="尾页";
        $config['prev_link']="上一页";
        $config['next_link']="下一页";
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        $config['first_tag_open']='<li>';
        $config['first_tag_close']='</li>';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['cur_tag_open']='<li class="comment_selected"><a href="notice/index/'.$offset.'" class="comment_selected">';
        $config['cur_tag_close']='</a></li>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $this->pagination->initialize($config);
        $rs=$this->notice_model->get_by_page($config['per_page'],$offset);
        // echo $this->pagination->create_links();
        $this->pagination->initialize($config);
        $arr = array(
            "blogs" => $rs
        );
        // var_dump($rs)
        if($rs){
            $this->load->view("notice", $arr);
        }else{
            $this->load->view("notice");
        }}
    }
    public function del_notice(){
        $this->load->model("notice_model");
        $id = $this->uri->segment(3);
        $result = $this->notice_model->del_notice($id);
        if ($result){
            redirect("notice/index");
        }else{
            echo "删除失败";
        }
    }
    public function add_notice(){
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
        $url = $this-> input ->post('url');
        $name = $this-> input ->post('name');
        $content = $this-> input ->post('content');
        $time = date("Y-m-d H:i:s");
        $this->load->model("notice_model");
        $row = $this-> notice_model ->save_notice(array(
            "href" => $url,
            "notice_name" => $name,
            "notice_img" => $photo_url,
            'notice_content' => $content,
            "addtime" =>$time
        ));
        redirect('notice');
    }
}