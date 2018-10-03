<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact_profile extends CI_Controller
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
			$data['contact']	= base_url().'index.php/Contact_profile/contact';
			$data['profile']	= base_url().'index.php/Contact_profile/profile';
			$data['dataContact'] = $this->Common_model->getAll("tb_contact_profile")->row_array();
			
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('contact_profile',$data);
				$this->load->view('common/footer');
			
		
	}

	public function contact(){
		$data=$this->input->post();
		$update=$this->Common_model->update("tb_contact_profile",$data,array("id"=>'1'));
		redirect(base_url('index.php/contact_profile'));
	}
	public function profile(){
		$data=$this->input->post();
		$update=$this->Common_model->update("tb_contact_profile",$data,array("id"=>'1'));
		redirect(base_url('index.php/contact_profile'));
	}
}