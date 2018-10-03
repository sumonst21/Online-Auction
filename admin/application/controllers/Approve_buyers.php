<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Approve_buyers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->controller('notification');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Common_model');

	}

	function index()
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['auctionList'] = $this->Common_model->getAll("tb_manage_auctions",array("archive"=>'0'))->result_array();
			// $data['add_data']	= base_url().'index.php/Buyers/add_data';
			// $data['edit']	= base_url().'index.php/Buyers/edit';
			// $data['delete']	= base_url().'index.php/Buyers/delete';
			//$data['buyers_list'] = $this->Buyers_model->get_buyer();
			

			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('approve_buyers',$data);
				$this->load->view('common/footer');
			
		
	}

	
}