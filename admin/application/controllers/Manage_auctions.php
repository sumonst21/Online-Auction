<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Manage_auctions extends CI_Controller
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
			$data['auctionList'] = $this->Auctions_model->get_auctions();
		
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('manage_auctions',$data);
				$this->load->view('common/footer');
			
		
	}

	function add_buyers($id)
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['buyer_list'] = $this->Common_model->getAll("tb_buyers")->result_array();
			$data['auction_id'] = $id;
			$data['add_buyer_data']=base_url().'index.php/Manage_auctions/add_buyer_data';
			//$data['invited_data']=$this->Common_model->getAll("tb_buyer_invite",array("auction_id"=>$id))->result_array();
			$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id))->result_array();
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('add_buyers',$data);
				$this->load->view('common/footer');
			
		
	}

	public function add_buyer_data(){
		$data['buyer_invite_auction_id']=$this->input->post('auction_id');
		$data['buyer_invite_buyer_id']=implode(',', $this->input->post('buyer'));
		$check = $this->Common_model->getAll("tb_buyer_invite",array('buyer_invite_auction_id' =>$data['buyer_invite_auction_id']))->row_array();
		if($check!=null){
			$upd = $this->Common_model->update("tb_buyer_invite",$data,array("buyer_invite_auction_id"=>$data['buyer_invite_auction_id']));
		}
		else{
			$ins = $this->Common_model->insert("tb_buyer_invite",array('buyer_invite_auction_id' =>$data['buyer_invite_auction_id'] , 'buyer_invite_buyer_id'=>$data['buyer_invite_buyer_id']));
		}
		

		redirect(base_url('index.php/manage_auctions'));
	}
	public function buyer_add_function(){
	 	$data = $this->input->post();
	 	$upd = $this->Common_model->insert("tb_buyer_invite",$data);
	 }

	public function add_lot(){
		
		$data = $this->input->post();
		$this->load->view('common/header', $data);
		$this->load->view('common/nav');
		$data['editLot']	= base_url().'index.php/Manage_auctions/editLot';
		$data['lot_list'] = $this->Auctions_model->get_lot_list($data['auction_id']);
		$data['add_lot_data']=base_url().'index.php/Manage_auctions/add_lot_data';
		$this->load->view('add_lot',$data);
		$this->load->view('common/footer');

	}
	 public function add_lot_data(){
	 	$data=$this->input->post();
	 	$insert=$this->Auctions_model->add_lot_data($data);
	 	redirect(base_url('index.php/manage_auctions'));
	 }
	 public function make_live(){
	 	$data = $this->input->post();
	 	$upd = $this->Common_model->update("tb_manage_auctions",$data,array("id_m_a"=>$data['id_m_a']));
	 	//$id=$this->input->post('id_m_a');
	 	//$update=$this->Auctions_model->live($id);
	 	
	 }
	 public function make_archive(){
	 	$data = $this->input->post();
	 	$upd = $this->Common_model->update("tb_manage_auctions",$data,array("id_m_a"=>$data['id_m_a']));
	 	//$id=$this->input->post('id_m_a');
	 	//$update=$this->Auctions_model->live($id);
	 	
	 }
	 public function make_delete(){
	 	$data = $this->input->post();
	 	$upd = $this->Common_model->update("tb_manage_auctions",$data,array("id_m_a"=>$data['id_m_a']));
	 	//$id=$this->input->post('id_m_a');
	 	//$update=$this->Auctions_model->live($id);
	 	
	 }

	public function edit_data(){
		$data=$this->input->post();
		$id=$this->input->post('company_id');
		$update=$this->Companies_model->edit_data($id,$data);
		redirect(base_url('index.php/companies'));

	}
	public function delete(){
		$id=$this->input->post('id_m_a');
		$update=$this->Common_model->delete("tb_manage_auctions",array("id_m_a"=>$id));
		redirect(base_url('index.php/Manage_auctions'));
	}
	
	public function editLot(){
		$id=$this->input->post('lot_id');

		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['edit_Lot_data']=base_url().'index.php/Manage_auctions/editLotData';
		
		$data['editLotData']=$this->Common_model->getAll("tb_lot",array("id_lot"=>$id))->row_array();
		
		$this->load->view('common/header', $data);
		$this->load->view('common/nav');
		$this->load->view('editLot',$data);
		$this->load->view('common/footer');

	}
	
	public function editLotData(){
		$data=$this->input->post();
		$update=$this->Common_model->update("tb_lot",$data,array("id_lot"=>$data['id_lot']));
		redirect(base_url('index.php/Manage_auctions'));
	}
	
	
	public function edit(){
		$id=$this->input->post('company_id');
		$data['companyEdit'] = $this->Companies_model->get_company_edit($id);
		$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_data']	= base_url().'index.php/Companies/add_data';
			$data['edit_data']	= base_url().'index.php/Companies/edit_data';
			$data['edit']	= base_url().'index.php/Companies/edit';
			$data['companyList'] = $this->Companies_model->get_company();
			// $companyname=$this->company_model->get_loggedcompany();   
			// $data['com_id']=$companyname[0]['cmp_id'];
			//$this->session->set_userdata('companyname', $companyname[0]['cmp_name']);
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('editCompany',$data);
				$this->load->view('common/footer');

	}
}