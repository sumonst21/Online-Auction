<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Buyers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->controller('notification');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Buyers_model');
	    $this->load->model('Add_user_model'); 

	    //for password encryption
	    $this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->ci->load->library('session');
		$this->ci->load->database();
		$this->ci->load->model('tank_auth/users');
		//password
	}

	function index()
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_data']	= base_url().'index.php/Buyers/add_data';
			$data['edit']	= base_url().'index.php/Buyers/edit';
			$data['delete']	= base_url().'index.php/Buyers/delete';
			$data['ban']	= base_url().'index.php/Buyers/ban';
			$data['remove_ban']	= base_url().'index.php/Buyers/remove_ban';
			$data['buyers_list'] = $this->Buyers_model->get_buyer();
			

			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('buyers',$data);
				$this->load->view('common/footer');
			
		
	}

	public function add_data(){
		$data=$this->input->post();
		$insert=$this->Buyers_model->add_buyer($data);
		$username=$data['username'];
		$password=$data['password'];
		$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
		$hashed_password = $hasher->HashPassword($password);
		$authentication_data=$this->Add_user_model->add_cred($username,$hashed_password,"2");
		redirect(base_url('index.php/buyers'));

	}
	public function edit_data(){
		$data=$this->input->post();
		$id=$this->input->post('buyer_id');
		$update=$this->Buyers_model->edit_data($id,$data);
		$username=$data['username'];
		$password=$data['password'];
		$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
		$hashed_password = $hasher->HashPassword($password);
		$authentication_data=$this->Add_user_model->update_cred($id,$username,$hashed_password);
		redirect(base_url('index.php/buyers'));

	}
	public function delete(){
		$id=$this->input->post('buyer_id');
		$update=$this->Buyers_model->delete($id);
		redirect(base_url('index.php/buyers'));

	}
	public function ban(){
		$username=$this->input->post('username');
		$update=$this->Buyers_model->ban($username);
		redirect(base_url('index.php/buyers'));

	}
	public function remove_ban(){
		$username=$this->input->post('username');
		$update=$this->Buyers_model->remove_ban($username);
		redirect(base_url('index.php/buyers'));

	}
	public function edit(){
		$id=$this->input->post('buyer_id');
		$data['buyerEdit'] = $this->Buyers_model->get_buyer_edit($id);
		$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_data']	= base_url().'index.php/Buyers/add_data';
			$data['edit_data']	= base_url().'index.php/Buyers/edit_data';
			$data['edit']	= base_url().'index.php/Buyers/edit';
			$data['buyers_list'] = $this->Buyers_model->get_buyer();
			//$data['companyList'] = $this->Companies_model->get_company();
			// $companyname=$this->company_model->get_loggedcompany();   
			// $data['com_id']=$companyname[0]['cmp_id'];
			//$this->session->set_userdata('companyname', $companyname[0]['cmp_name']);
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('editBuyer',$data);
				$this->load->view('common/footer');

	}
}