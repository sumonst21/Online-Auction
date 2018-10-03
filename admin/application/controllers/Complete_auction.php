<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Complete_auction extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->controller('notification');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Auctions_model');
	}

	function index()
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['auctionList'] = $this->Auctions_model->get_auctions();
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('complete_auction',$data);
				$this->load->view('common/footer');
			
		
	}

	
}