<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Archived extends CI_Controller
{
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

	function index()
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_lot']	= base_url().'index.php/Manage_auctions/add_lot';
			$data['edit']	= base_url().'index.php/Manage_auctions/edit';
			
			$data['delete']	= base_url().'index.php/Manage_auctions/delete';
			$data['auctionList'] = $this->Auctions_model->get_archived_auctions();
		
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('archived',$data);
				$this->load->view('common/footer');
			
		
	}

	 public function make_archive(){
	 	$data = $this->input->post();
	 	$upd = $this->Common_model->update("tb_manage_auctions",$data,array("id_m_a"=>$data['id_m_a']));
	 	//$id=$this->input->post('id_m_a');
	 	//$update=$this->Auctions_model->live($id);
	 	
	 }
}