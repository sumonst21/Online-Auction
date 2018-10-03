<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getSeller($id)
	{
		$this->db->where('id_m_a',$id);
		$this->db->join('tb_companies','tb_companies.company_id=tb_manage_auctions.seller_id');
		$query = $this->db->get('tb_manage_auctions');
		return $query->row_array();
	}
	public function getBuyer($username)
	{
		$this->db->where('username',$username);
		// $this->db->join('tb_buyers','tb_buyers.buyer_id=tb_manage_auctions.seller_id');
		$query = $this->db->get('tb_buyers');
		return $query->row_array();
	}

	public function get_lot_count($id){
		$this->db->select('*');
		$this->db->where('auction_id',$id);
		$this->db->where('lot_status','1');
		$this->db->from('tb_lot');
		$query=$this->db->count_all_results();
		return$query;
	}


	public function getAll($tablename,$where='',$orderby='',$column='',$limit='')
	{
		if($where!=''){ $this->db->where($where); }
		if($orderby!=''){ $this->db->order_by($column,$orderby); }
		if($limit!=''){ $this->db->limit($limit); }
		$query = $this->db->get($tablename);
		return $query;
	}
	
	public function getOnlineUsers()
	{
		$query = $this->db->get("users");
		return $query;
	}

	public function getAuctionData($id)
	{
		$this->db->where('id_lot',$id);
		$this->db->join('tb_manage_auctions','tb_manage_auctions.id_m_a=tb_lot.auction_id');
		$query = $this->db->get('tb_lot');
		return $query->row_array();
	}

	function getsum($tablename,$where='',$orderby='',$column='')
	{
		$this->db->select('SUM(ord_amount) AS amount');
		if($where!=''){ $this->db->where($where); }
		if($orderby!=''){ $this->db->order_by($column,$orderby); }
		$query = $this->db->get($tablename);
		return $query;
	}
	public function insert($tablename,$data) 
	{ 
		$this->db->insert($tablename,$data);
		return $this->db->insert_id();
	} 

	public function update($tablename,$data,$where) 
	{ 
		$this->db->where($where); 
		$query = $this->db->update($tablename,$data); 
		return $query;
	} 

	public function delete($tablename,$where) 
	{ 
		$this->db->where($where); 
		$query = $this->db->delete($tablename); 
		return $query;
	}
	
	public function getjob()
	{
		$query = $this->db->query("SELECT * FROM tbl_order WHERE ord_pickup_date =  '".date('Y-m-d')."' and ord_pickup_time >= '".date('H:i')."' and ord_status='Pending' and ord_pay_status='Paid'");
		return $query->result_array();
	}
	public function get_driver_order_history($driver_id)
	{
		$this->db->select('a.*,b.ord_pickup_address,b.ord_pickup_city,b.ord_pickup_zip,b.ord_pickup_lat,b.ord_pickup_long');
		$this->db->from('tbl_jobhistory a');
		$this->db->join('tbl_order b','b.ord_id=a.his_orderid','left');
		$this->db->where("a.his_driverid",$driver_id);
		$this->db->where("a.his_status !=","Autoreject");
		$query = $this->db->get();
		return $query->result_array(); 
	}
	function distance($lat1, $lon1, $lat2, $lon2, $unit) 
	{
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		if ($unit == "K") {
			return ($miles * 1.609344);
		} 
		else if ($unit == "N") {
			return ($miles * 0.8684);
		} 
		else 
		{
			return $miles;
		}
	}  
}
?>