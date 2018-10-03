<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
function __construct()
	{
		parent::__construct();
		//$this->load->controller('notification');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Common_model');
	}
	public function index()
	{
		$type=$this->tank_auth->get_user_type();
		if(!$this->tank_auth->is_logged_in()){
			redirect('/auth/login/');
			
		}
		if ($type!='2') {

			redirect('/auth/logout/');
		}
		else
		{
			$this->Common_model->update("users",array('lastUpdate' => DATE("Y:n:d h:i:s")),array('id' => $this->tank_auth->get_user_id()));
			$data['auctionList'] = $this->Common_model->getAll("tb_manage_auctions",array('status'=>1,'live'=>1),"","")->result_array();
			
			$this->Common_model->update("users",array("loggedin"=>date("h:i:s")),array("id"=>$this->tank_auth->get_user_id()));
			$data['username']=$this->tank_auth->get_username();
			$this->load->view('common/header');
			$this->load->view('common/nav',$data);
			$this->load->view('dashboard',$data);
			$this->load->view('common/footer');
		}
	}
}
