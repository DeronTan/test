<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//得到model处理数据库的结果
class Food extends CI_Controller {
    public function index(){
        if (!$this->session->admin) {
                redirect('admin/login');
            }else{
        	$this->load->model('foods_model');//加载model下面的foods_model.php,为了调用它里面的方法获取数据库文件
        	$datas = $this->foods_model->get_all_food();//调用foods_model下边的get_all_food方法
        	$arr['datas']=$datas;
            $this->load->model('spot_model');
            $row = $this->spot_model->get_all_spot();
            $arr['row'] = $row; 
        	if ($datas) {
        		$this->load->view('food',$arr);//加载food.php页面
    	   }
        }
    }
    public function delect_food_by_id()
    {
    	$id = $this->uri->segment('3');//获取传过来的id值
    	$this->load->model('foods_model');
    	$datas = $this->foods_model->del_food_by_id($id);
    	if($id){
    		$this->load->view("food");
    	}else{
    		echo '删除失败';
    	}
    }
    public function add_food()
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
        $food_id = $this-> input ->post('id');
        $content = $this-> input ->post('content');
        $name = $this-> input ->post('name');
        $address = $this-> input ->post('deve');
        $this->load->model("foods_model");
        $row = $this-> foods_model ->save_food(array(
            "food_id" => $food_id,
            "food_name" => $name,
            "food_img" => $photo_url,
            'food_descri' => $content,
            "address" =>$address
        ));
        redirect('food/index');
    }
}
?>
