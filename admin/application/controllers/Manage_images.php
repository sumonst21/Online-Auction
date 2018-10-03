<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Manage_images extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->load->controller('notification');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Common_model');
	    //$this->load->model('department_model'); 
	}

	function index()
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['delete']	= base_url().'index.php/Companies/delete';
			$data['uploadImage1']	= base_url().'index.php/Manage_images/uploadImage1';
			$data['uploadImage2']	= base_url().'index.php/Manage_images/uploadImage2';
			$data['uploadImage3']	= base_url().'index.php/Manage_images/uploadImage3';
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('manage_images',$data);
				$this->load->view('common/footer');
			
		
	}

		
	public function uploadImage1()
	{
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name'] 		= TRUE;

                $this->load->library('upload');
				$this->upload->initialize($config);
                if ( ! $this->upload->do_upload('image1'))
                {
               

                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload', $error);
                }
                else
                {
                  $path=base_url()."uploads/".$this->upload->data('file_name');
                  
                  $data = array('image1'=>$path);

                  $update=$this->Common_model->update("tb_images",$data,array("id"=>'1'));
				  redirect(base_url('index.php/Manage_images'));
                  
                }	
	}
	public function uploadImage2()
	{
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name'] 		= TRUE;

                $this->load->library('upload');
				$this->upload->initialize($config);
                if ( ! $this->upload->do_upload('image1'))
                {
               

                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload', $error);
                }
                else
                {
                  $path=base_url()."uploads/".$this->upload->data('file_name');
                  
                  $data = array('image1'=>$path);

                  $update=$this->Common_model->update("tb_images",$data,array("id"=>'1'));
				  redirect(base_url('index.php/Manage_images'));
                  
                }	
	}
	public function uploadImage3()
	{
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name'] 		= TRUE;

                $this->load->library('upload');
				$this->upload->initialize($config);
                if ( ! $this->upload->do_upload('image1'))
                {
               

                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload', $error);
                }
                else
                {
                  $path=base_url()."uploads/".$this->upload->data('file_name');
                  
                  $data = array('image1'=>$path);

                  $update=$this->Common_model->update("tb_images",$data,array("id"=>'1'));
				  redirect(base_url('index.php/Manage_images'));
                  
                }	
	}
	
}