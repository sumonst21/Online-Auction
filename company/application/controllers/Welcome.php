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
		$this->load->model('Auctions_model');
		$this->load->model('Common_model');
	}
	public function index()
	{
		$username=$this->tank_auth->get_username();
		$seller_id=$this->tank_auth->get_company_id();
		$data['auctionList'] = $this->Common_model->getAll("tb_manage_auctions",array('seller_id' =>$seller_id,'live'=>'1'))->result_array();
		$type=$this->tank_auth->get_user_type();
		if(!$this->tank_auth->is_logged_in()){
			redirect('/auth/login/');
		}

		if ($type!='3') {

			redirect('/auth/logout/');
		}
		else
		{
			
			$this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('welcome',$data);
			//$this->load->view('common/footer');
		}
	}
}
