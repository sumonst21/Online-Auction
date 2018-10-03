<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Companies extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->controller('notification');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Companies_model');
	    //$this->load->model('department_model'); 
	}

	function index()
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_data']	= base_url().'index.php/Companies/add_data';
			$data['edit']	= base_url().'index.php/Companies/edit';
			$data['delete']	= base_url().'index.php/Companies/delete';
			$data['companyList'] = $this->Companies_model->get_company();
			// $companyname=$this->company_model->get_loggedcompany();   
			// $data['com_id']=$companyname[0]['cmp_id'];
			//$this->session->set_userdata('companyname', $companyname[0]['cmp_name']);
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('companies',$data);
				$this->load->view('common/footer');
			
		
	}

	public function add_data(){
		$data=$this->input->post();
		$insert=$this->Companies_model->add_company($data);
		redirect(base_url('index.php/companies'));

	}
	public function edit_data(){
		$data=$this->input->post();
		$id=$this->input->post('company_id');
		$update=$this->Companies_model->edit_data($id,$data);
		redirect(base_url('index.php/companies'));

	}
	public function delete(){
		$id=$this->input->post('company_id');
		$update=$this->Companies_model->delete($id);
		redirect(base_url('index.php/companies'));
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