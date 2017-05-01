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
		$this->load->model('spot_model');
		$this->load->model('notice_model');
		$this->load->model('hostel_model');
        $this->load->model('forum_model');
        $this->load->model('foods_model');
		$spot = $this->spot_model->get_spot();
		$notice = $this->notice_model->get_new_notice();
        $hostel = $this->hostel_model->get_hostel();
        $forum = $this->forum_model->get_forum();
    	$food = $this->foods_model->get_food();
        $arr = array(
        	'spot' => $spot,
        	'notice' => $notice,
        	'hostel' => $hostel,
        	'forum' => $forum,
        	'food' => $food
        	);
		$this->load->view('index',$arr);
	}
	public function content()
	{
		$this->load->model('spot_model');
		$this->load->model('path_model');
		$this->load->model('hostel_model');
        $this->load->model('foods_model');
		$id = $this->uri->segment(3);
		$spot = $this->spot_model->get_spot_by_id($id);
		$hostel = $this->hostel_model->get_hostel_by_id($id);
		$food = $this->foods_model->get_food_by_id($id);
		$path = $this->path_model->get_path_by_id($id);
		$spots = $this->spot_model->get_spot();

		$arr = array(
			'spot' => $spot,
			'spots' => $spots,
			'hostel' => $hostel,
			'food' => $food,
			'path' =>$path
			);
		$this->load->view('content',$arr);
	}
	public function comment()
	{
        $this->load->model('forum_model');
		$forum = $this->forum_model->get_all_forum();
		$arr = array('forum' => $forum );
		$this->load->view('comment',$arr);
	}
	public function login()
	{
		$this->load->view('login_user');
	}
	public function all_spot(){
        $this->load->model('spot_model');
		$spot = $this->spot_model->get_all_spot();
		$arr['spot'] = $spot;
		$this->load->view('all_spot',$arr);
	}
	public function personal(){
        $this->load->model('user_model');
        $this->load->model('forum_model');
        $this->load->model('order_model');
		if ($this->session->user) {
			$id = $this->session->user->user_id;
			$user = $this->user_model->get_user($id);
			$comment = $this->forum_model->get_user_forum($id);
			$order = $this->order_model->get_train_order($id);
			$order_hostel = $this->order_model->get_hostel_order($id);
			$arr = array(
				'user' => $user, 
				'comment' => $comment,
				'order' => $order,
				'order_hostel' => $order_hostel
				);
			$this->load->view('personal',$arr);
			
		}else{
			redirect('welcome/login');
		}
	}
	public function add_orders()
	{
		$start=$this->input->get('start');
		echo $start;
		$end = $this->input->get('end');
		$hostel = $this->input()->get('hostel');
		$id = $this->session->user->user_id;
		$arr = array(
			'order_start' => $start,
			'order_end' =>$end,
			'order_hostel'=>$hostel,
			'user_id'=>$id,
			'addtime'=> date('Y-m-d H:i:s')
			);
		if ($hostel) {
			$arr['type']=1;
		}else{
			$arr['type']=0;
		}
		$this->load->model('order_model');
		$rs = $this->order_model->add_order($arr);
		echo $rs;
	}
	public function add_comment()
	{
		$comment = $this->input->post('content');
		$user_id = $this->session->user->user_id;
		$forum_id = $this->input->post('id');
		$arr = array(
			'comment_content' => $comment, 
			'user_id' =>$user_id,
			'forum_id' =>$forum_id
			);
		$this->load->model('forum_model');
		$rs = $this->forum_model->add_comment_by_user($arr);
		if ($rs) {
			redirect('welcome/comment');
		}
	}
	public function add_forum()
	{
		$content = $this->input->post('content');
		$user_id = $this->session->user->user_id;
		$title = $this->input->post('title');
		$arr = array(
			'forum_titlt' => $title, 
			'sponsor' =>$user_id,
			'forum_content' =>$content,
			'is_delete'=>0,
			'forum_addtime'=>date('Y-m-d H:i:s')
			);
		$this->load->model('forum_model');
		$rs = $this->forum_model->add_forum($arr);
		redirect('welcome/comment');
	}
}
