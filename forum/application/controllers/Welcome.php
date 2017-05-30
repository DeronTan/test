<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this-> load ->model('love_model');
		$love = $this-> love_model ->get_love_index();
		$this-> load ->model('tree_model');
		$tree = $this-> tree_model ->get_tree_index();
		$this-> load ->model('claim_model');
		$claim = $this-> claim_model ->get_claim_index();
		$this-> load ->model('goods_model');
		$goods = $this-> goods_model ->get_goods_index();
		$arr = array(
			"love" => $love,
			"tree" => $tree,
			"claim" => $claim,
			"goods" => $goods,
			);
		$this->load->view('index',$arr);
	}
	public function goods()
	{
		$this-> load ->model('goods_model');
		$goods = $this-> goods_model ->get_goods_all();
		$arr = array(
			"goods" => $goods,
			);
		$this->load->view('goods',$arr);
	}
	public function love()
	{
		$this-> load ->model('love_model');
		$love = $this-> love_model ->get_love_all();
		$arr = array(
			"love" => $love,
			);
		$this->load->view('love',$arr);
	}
	public function tree()
	{
		$this-> load ->model('tree_model');
		$tree = $this-> tree_model ->get_tree_all();
		$arr = array(
			"tree" => $tree,
			);
		$this->load->view('tree',$arr);
	}
	public function claim()
	{
		$this-> load ->model('claim_model');
		$claim = $this-> claim_model ->get_claim_all();
		$arr = array(
			"claim" => $claim,
			);
		$this->load->view('claim',$arr);
	}
	public function personal()
	{	
		if($this->session->user){
			$id = $this->session->user->user_id;
			$this-> load ->model('love_model');
			$love = $this-> love_model ->get_love_by_userid($id);
			$this-> load ->model('tree_model');
			$tree = $this-> tree_model ->get_tree_by_userid($id);
			$this-> load ->model('claim_model');
			$claim = $this-> claim_model ->get_claim_by_userid($id);
			$this-> load ->model('goods_model');
			$goods = $this-> goods_model ->get_goods_by_userid($id);
			$this-> load ->model('order_model');
			$order = $this-> order_model ->get_order_by_userid($id);
			$arr = array(
				"love" => $love,
				"tree" => $tree,
				"claim" => $claim,
				"goods" => $goods,
				"order" => $order
				);
			$this->load->view('personal',$arr);
		}else{
			redirect('welcome/login');
		}
		
	}
	public function get_claim()
	{
		$id = $this->input->get('id');
		$this-> load ->model('claim_model');
		$claim = $this-> claim_model ->get_claim_by_id($id);
		echo json_encode($claim);
	}
	public function get_goods()
	{
		$id = $this->input->get('id');
		$this-> load ->model('goods_model');
		$goods = $this-> goods_model ->get_goods_by_id($id);
		echo json_encode($goods);
	}
	public function del_claim()
	{
		$this-> load ->model('claim_model');
		$id = $this->input->get('id');
		$claim = $this-> claim_model ->del_claim_by_id($id);
		echo $claim;
	}
	public function del_goods()
	{
		$this-> load ->model('goods_model');
		$id = $this->input->get('id');
		$goods = $this-> goods_model ->del_goods_by_id($id);
		echo $goods;
	}
	public function del_love()
	{
		$this-> load ->model('love_model');
		$id = $this->input->get('id');
		$love = $this-> love_model ->del_love_by_id($id);
		echo $love;
	}
	public function del_tree()
	{
		$this-> load ->model('tree_model');
		$id = $this->input->get('id');
		$tree = $this-> tree_model ->del_tree_by_id($id);
		echo $tree;
	}
	public function del_order()
	{
		$this-> load ->model('order_model');
		$id = $this->input->get('id');
		$order = $this-> order_model ->del_order_by_id($id);
		echo $order;
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function re()
	{
		$this->load->view('reg');
	}
	public function do_login()
	{
		$name = $this->input->post('name');
		$password = $this->input->post('password');
        $this->load->model("user_model");
    	$result = $this->user_model->do_login($name,$password);
        $user=$result;
    	
		$arr = array(
			'user' =>$user
			);
		if($result){
            $this->session->set_userdata($arr);
            redirect("welcome/index");	//控制器下方法,首页

        }else{
            echo "用户名密码错误";
        }
	}
	public function loginout()
	{
		$this->session->unset_userdata("user");
        redirect('welcome');
	}
	public function buy()
	{
		$id = $this->session->user->user_id;
		$goods_id = $this->input->get('id');
		$this->load->model("order_model");
        $row = $this-> order_model ->save_order(array(
			 'goods_id'=>$goods_id,
			 'user_id'=>$id    
        ));
        echo $row;
	}
	public function add_goods()
	{
		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3072;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('img_src');
        $upload_data = $this -> upload -> data();
        $photo_url = 'img/'.$upload_data['file_name'];
        $user_id = $this-> session ->user->user_id;
        $name = $this-> input ->post('name');
        $detail = $this-> input ->post('detail');
        $price = $this-> input ->post('price');
        $this->load->model("goods_model");
        $row = $this-> goods_model ->save_goods(array(
			 'goods_name'=>$name,
			 'goods_detail'=>$detail,
			 'user_id'=>$user_id,     
			 'img_src'=>$photo_url,
			 'price'=>$price
        ));
        redirect('welcome/goods');
	}
	public function add_claim()
	{
		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3072;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('img_src');
        $upload_data = $this -> upload -> data();
        $photo_url = 'img/'.$upload_data['file_name'];
        $user_id = $this-> session ->user->user_id;
        $title = $this-> input ->post('title');
        $detail = $this-> input ->post('detail');
        $this->load->model("claim_model");
        $row = $this-> claim_model ->save_claim(array(
			 'claim_title'=>$title,
			 'claim_detail'=>$detail,
			 'user_id'=>$user_id,     
			 'img'=>$photo_url,
			 'addtime'=>date('Y-m-d H:i:s')
        ));
        redirect('welcome/claim');
	}
	public function add_tree()
	{
		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3072;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        //图片上传操作
        $this -> load -> library('upload', $config);
        $this -> upload -> do_upload('img_src');
        $upload_data = $this -> upload -> data();
        $photo_url = 'img/'.$upload_data['file_name'];
        $user_id = $this-> session ->user->user_id;
        $detail = $this-> input ->post('detail');
        $this->load->model("tree_model");
        $row = $this-> tree_model ->save_tree(array(
			 'tree_detail'=>$detail,
			 'user_id'=>$user_id,     
			 'image'=>$photo_url,
			 'tree_time'=>date('Y-m-d H:i:s')
        ));
        redirect('welcome/tree');
	}
	public function add_love()
	{
        $user_id = $this-> session ->user->user_id;
        $content = $this-> input ->post('detail');
        $this->load->model("love_model");
        $row = $this-> love_model ->save_love(array(
			 'content'=>$content,
			 'user_id'=>$user_id,     
			 'addtime'=>date('Y-m-d H:i:s')
        ));
        redirect('welcome/love');
	}
	public function add_user()
	{
        $name = $this-> input ->post('name');
        $tel = $this-> input ->post('tel');
        $password = $this-> input ->post('password');
        $this->load->model("user_model");
        $row = $this-> user_model ->save_user(array(
			 'password'=>$password,
			 'tel'=>$tel,     
			 'username'=>$name
        ));
        if ($row) {
        	$arr = array(
			'user' =>$row
			);
            $this->session->set_userdata($arr);
        	redirect('welcome');
        }

	}
}
