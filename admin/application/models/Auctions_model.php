<?php
class Auctions_model extends CI_Model {
	function __construct()
	{
		//call the model constructor
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function add_auction($data){
		$query=$this->db->insert('tb_manage_auctions',$data);
		$insert_id=$this->db->insert_id();
		return $insert_id;
	}
	public function add_lot_data($data){
		$query=$this->db->insert('tb_lot',$data);
		return;
	}
	public function get_lot_count($id){
		$this->db->select('*');
		$this->db->where('auction_id',$id);
		$this->db->where('lot_status','1');
		$this->db->from('tb_lot');
		$query=$this->db->count_all_results();
		return$query;
	}

	public function get_lot_list($id){
		$this->db->select('*');
		$this->db->from('tb_lot');

		$this->db->join('tb_manage_auctions', 'tb_manage_auctions.id_m_a = tb_lot.auction_id');

		$this->db->where('lot_status','1');
		$this->db->where('auction_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function live($id){
		$this->db->where('id_m_a',$id);
		$this->db->set('live','1');
		$query=$this->db->update('tb_manage_auctions');
		return;
	}
	

	public function get_seller_list(){
		$this->db->select('*');
		$this->db->from('tb_companies');
		$this->db->where('status','1');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function get_auctions(){
		$this->db->select('*');
		$this->db->from('tb_manage_auctions');
		$this->db->where('status','1');
		$this->db->where('archive','0');
		
		$query=$this->db->get();
		return $query->result_array();
	}
	public function get_archived_auctions(){
		$this->db->select('*');
		$this->db->from('tb_manage_auctions');
		$this->db->where('status','1');
		$this->db->where('archive','1');
		
		$query=$this->db->get();
		return $query->result_array();
	}
	public function get_auctions_live(){
		$this->db->select('*');
		$this->db->from('tb_manage_auctions');
		$this->db->where('status','1');
		$this->db->where('live','1');
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