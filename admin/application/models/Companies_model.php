<?php
class Companies_model extends CI_Model {
	function __construct()
	{
		//call the model constructor
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function add_company($data){
		$query=$this->db->insert('tb_companies',$data);
		return;
	}
	public function get_company(){
		$this->db->select('*');
		$this->db->from('tb_companies');
		$this->db->where('status','1');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function get_company_edit($id){
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->from('tb_companies');
		$this->db->where('company_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function edit_data($id,$data){
		$this->db->where('company_id',$id);
		
		$query=$this->db->update('tb_companies',$data);
		return;
	}
	public function delete($id){
		$this->db->where('company_id',$id);
		$this->db->set('status','0');
		$query=$this->db->update('tb_companies');
		return;
	}
}
?>