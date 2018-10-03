<?php
class Add_user_model extends CI_Model {
	function __construct()
	{
		
		//call the model constructor
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function add_cred($username,$password){
		$data=array('username' =>$username ,'password'=>$password);
		$query=$this->db->insert('users',$data);
		return;
	}
}
?>