<?php
class Add_user_model extends CI_Model {
	function __construct()
	{
		
		//call the model constructor
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function add_cred($username,$password,$type){
		$data=array('username' =>$username ,'password'=>$password,'type'=>$type);
		$query=$this->db->insert('users',$data);
		return;
	}
	public function update_cred($id,$username,$password,$type){
		$data=array('username' =>$username ,'password'=>$password);
		$this->db->where('id',$id);
		$this->db->where('type','2');
		$query=$this->db->update("users",$data);
		return;
	}
}
?>