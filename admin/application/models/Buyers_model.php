<?php
class Buyers_model extends CI_Model {
	function __construct()
	{
		//call the model constructor
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function add_buyer($data){
		$query=$this->db->insert('tb_buyers',$data);
		return;
	}
	public function get_buyer(){
		$this->db->select('*');
		$this->db->from('tb_buyers');
		$this->db->order_by('buyer_company_name','ASC');
		$this->db->where('status','1');
		$query=$this->db->get();
		return $query->result_array();

	}
	public function get_buyer_edit($id){
		$this->db->select('*');
		$this->db->from('tb_buyers');
		$this->db->where('buyer_id',$id);
		$this->db->where('status','1');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function edit_data($id,$data){
		$this->db->where('buyer_id',$id);
		
		$query=$this->db->update('tb_buyers',$data);
		return;
	}
	public function delete($id){
		$this->db->where('buyer_id',$id);
		$this->db->set('status','0');
		$query=$this->db->update('tb_buyers');
		return;
	}
	public function ban($username){
		$this->db->where('username',$username);
		$this->db->set('banned','1');
		$query=$this->db->update('users');
		return;
	}
	public function remove_ban($username){
		$this->db->where('username',$username);
		$this->db->set('banned','0');
		$query=$this->db->update('users');
		return;
	}
}
?>