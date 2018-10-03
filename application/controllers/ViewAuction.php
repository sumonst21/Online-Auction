<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ViewAuction extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('tank_auth');
		$this->load->model('Common_model');
	}
	function allinone()
	{
		$id = $this->input->post('lot_id');
		
		
		//Function to get info about lot and auction
		$lotdetails= $this->Common_model->getAuctionData($id);
		$highestbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		if(empty($highestbid)){ $highestbid['bidding_price']=0; }
		$yourbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id,"buyer_id"=>$this->tank_auth->get_user_id()),"DESC","bidding_price")->row_array();
		if(empty($yourbid)){ $yourbid['bidding_price']=0; }
		$rank = $this->db->query("SELECT buyer_id FROM (SELECT * FROM `tb_bidding` where lot_id ='$id' ORDER BY `bidding_price` DESC) as rank GROUP BY buyer_id ORDER BY bidding_price DESC")->result_array();
		if(!empty($rank))
		{
			$key = array_search($this->tank_auth->get_user_id(), $rank);
			$i = 1; foreach ($rank as $key => $value) { if($value['buyer_id'] == $this->tank_auth->get_user_id()) { $yourrank = $i; break; }
			else{ $yourrank='0'; } $i +=1; }
		}
		else{
			$yourrank='0';
		}

		if($highestbid['bidding_price']==0){ $bidprice =  $lotdetails['lot_start_bid'] ;}
		else { $bidprice = $highestbid['bidding_price'] +  $lotdetails['lot_increment_by'] ; }
		$final = array("startbid"=>$lotdetails['lot_start_bid'],"increment"=>$lotdetails['lot_increment_by'],
			"lot_product_qty"=>$lotdetails['lot_product_qty'],"startdate"=>$lotdetails['lot_start_date'],"starttime"=>$lotdetails['lot_start_time'],"enddate"=>$lotdetails['lot_end_date'],"endtime"=>$lotdetails['lot_end_time'],"highestbid"=>$highestbid['bidding_price'],"yourbid"=>$yourbid['bidding_price'],"yourrank"=>$yourrank,"bidprice" => $bidprice);
		
		//echo date("Y-m-d H:i:s",strtotime($lotdetails['lot_end_date']." ".$lotdetails['lot_end_time']));
		if(strtotime(date('Y-m-d H:i:s')) > strtotime($lotdetails['lot_end_date']." ".$lotdetails['lot_end_time']))
		{
			echo 0; 
		}
		else{
			echo json_encode($final);
		}
		
	}


	function allIn($id){
		$user_authenticate=$this->Common_model->getAll("users",array('id'=>$this->tank_auth->get_user_id()))->row_array();
		$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id,"activate"=>'1'))->result_array();
			$data['action']	= base_url()."ViewAuction/activate";
			//print_r($data['lotlist']);
			?>

			<table id="BidTable" width="100%" style="border: 5px solid orange;" class="table">
            <thead>
              <tr>
                
                <th style="text-align: center;">Lot No.</th>
                <th>Details</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Start Bid</th>
                <th style="text-align: center;">Increment</th>
                <th style="text-align: center;">Highest Bid</th>
                <th style="text-align: center;">Your Bid</th>
                <th style="text-align: center;">Your Rank</th>
                <th style="text-align: center;">Time Remaining</th>
                <th style="text-align: left;">Next Bid</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                
                $i=1; foreach ($data['lotlist'] as $list) {?>


                	<?php
                	$id=$list['id_lot'];
                	$approved_id=$this->Common_model->getAll("tb_approved",array('approved_lot_id'=>$id))->row_array();
                //print_r($approved_id);
                 $expl=explode(",",$approved_id['approved_buyer_id']);
				 //print_r($expl);




        $lotdetails= $this->Common_model->getAuctionData($id);
		$highestbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		if(empty($highestbid)){ $highestbid['bidding_price']=0; }
		$yourbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id,"buyer_id"=>$this->tank_auth->get_user_id()),"DESC","bidding_price")->row_array();
		if(empty($yourbid)){ $yourbid['bidding_price']=0; }
		$rank = $this->db->query("SELECT buyer_id FROM (SELECT * FROM `tb_bidding` where lot_id ='$id' ORDER BY `bidding_price` DESC) as rank GROUP BY buyer_id ORDER BY bidding_price DESC")->result_array();
		if(!empty($rank))
		{
			$key = array_search($this->tank_auth->get_user_id(), $rank);
			$i = 1; foreach ($rank as $key => $value) { if($value['buyer_id'] == $this->tank_auth->get_user_id()) { $yourrank = $i; break; }
			else{ $yourrank='0'; } $i +=1; }
		}
		else{
			$yourrank='0';
		}


		if($highestbid['bidding_price']==0){ $bidprice =  $lotdetails['lot_start_bid'] ;}
		else { $bidprice = $highestbid['bidding_price'] +  $lotdetails['lot_increment_by'] ; }
		$final = array("startbid"=>$lotdetails['lot_start_bid'],"increment"=>$lotdetails['lot_increment_by'],
			"lot_product_qty"=>$lotdetails['lot_product_qty'],"startdate"=>$lotdetails['lot_start_date'],"starttime"=>$lotdetails['lot_start_time'],"enddate"=>$lotdetails['lot_end_date'],"endtime"=>$lotdetails['lot_end_time'],"highestbid"=>$highestbid['bidding_price'],"yourbid"=>$yourbid['bidding_price'],"yourrank"=>$yourrank,"bidprice" => $bidprice);
		
		
					$date_expire = $final['enddate'].' '.$final['endtime'];
                  $now= new DateTime(); 
                  $endTime= new DateTime($date_expire); 
                  $diff=date_diff( $now, $endTime );
				if($user_authenticate['banned']=='1'){
					
					$this->tank_auth->logout();
					header("refresh: 1");

				}

                	 ?>


                <?php if ($endTime > $now) {  
                		if(in_array($this->tank_auth->get_user_id(), $expl)) {

                	?>
                <tr>
                  
                  <td style="text-align: center;"><?php echo $list['lot_number']; ?></td>
                  <td><?php echo $list['lot_description']; ?></td>
                  <td style="text-align: center;"><?php echo $list['lot_product_qty']; ?></td>
                  <td style="text-align: center;"><?php echo $list['lot_start_bid']; ?></td>
                  <td style="text-align: center;"><?php echo $list['lot_increment_by']; ?></td>
                  <td style="text-align: center; color: red;"><?php echo $final['highestbid']; ?></td>
                  <td style="text-align: center;"><?php echo $final['yourbid']; ?></td>
                  <td style="text-align: center; <?php if($final['yourrank'] > '1'){ echo "color:red;"; } ?>"><?php echo $final['yourrank']; ?></td>
                  
                  <td 
                  <?php if($diff->format('%s') <= '30' && $diff->format('%i')=='0' && $diff->format('%h')=='0') { ?>  
                  style="color: red; font-size: 20px; font-weight: 200%;" <?php } ?> style="font-size: 20px; font-weight: 200%;" > 
                  
                  <?php echo $diff->format('%h : %i : %s');?>
                  	
                  </td>


                  <td>
                    <div class="input-group">
                      
                      <input type="text" class="form-control" value="<?php echo $final['bidprice']; ?>" id="#">
                      <span class="input-group-btn">
                      	<?php if ($final['yourrank']!=1) { ?>
                        <button type="button" class="btn btn-primary bidbtn chart<?php echo $list['id_lot']; ?> " onclick="sendBid(<?php echo $list['id_lot']; ?>,<?php echo $final['bidprice']; ?>)">Bid Now!</button>
                        <?php } ?>
                      </span>
                   </div>
                  </td>
                </tr>

                <?php $i=$i+1; } } }?>
            </tbody>
        </table>
	
	<?php } 


	function viwewlots($id)
	{
		$type=$this->tank_auth->get_user_type();
		if(!$this->tank_auth->is_logged_in()){
			redirect('/auth/login/');
			
		}
		if ($type!='2') {

			redirect('/auth/logout/');
		}
		else
		{
			$this->Common_model->update("users",array('lastUpdate' => DATE("Y:n:d h:i:s")),array('id' => $this->tank_auth->get_user_id()));
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_lot']	= base_url().'index.php/Manage_auctions/add_lot';
			$data['edit']	= base_url().'index.php/Manage_auctions/edit';
			$data['auctionDetail'] = $this->Common_model->getAll("tb_manage_auctions",array("id_m_a"=>$id))->row_array();
			$data['delete']	= base_url().'index.php/Manage_auctions/delete';
			

				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('selectLot',$data);
				$this->load->view('common/footer',$data);
		}
		
	}
	function activate($id,$stat,$auction)
	{
		if($stat==0){ $stat=1; }elseif($stat==1){ $stat=0; }
		$this->Common_model->update("tb_lot",array("activate"=>$stat),array("id_lot"=>$id));
		redirect(base_url().'ViewAuction/viwewlots/'.$auction);

	}

	function getAuctionData()
	{
		$id=$this->input->post('id_lot');
		$info= $this->Common_model->getAuctionData($id);
		echo json_encode($info);
		//return $data;
		//echo "You requested data for ".$id;
		// $this->Common_model->getAll("get_auc",array("activate"=>$stat),array("id_lot"=>$id));
		// redirect(base_url().'ViewAuction/viwewlots/'.$auction);

	}
	function rank()
	{
		$data=$this->input->post();
		$data['id_lot'] = 1;
		$rank = $this->db->query("SELECT buyer_id FROM (SELECT * FROM `tb_bidding` where lot_id =".$data['id_lot']." ORDER BY `bidding_price` DESC) as rank GROUP BY buyer_id ORDER BY bidding_price DESC")->result_array();
		$key = array_search($this->tank_auth->get_user_id(), $rank);
		$i = 1;
		foreach ($rank as $key => $value) {
			
			if($value['buyer_id'] == $this->tank_auth->get_user_id())
			{
				echo $i;
				break;
			}
			else{
				echo '0';
			}
			$i +=1;
		}

	}
	function biddingData()
	{
		$id=$this->input->post('id_lot');
		$info= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		if(empty($info))
		{
			echo 0;
		}
		else{
			echo json_encode($info);
		}
		
		
	}
	function insertBid()
	{

		$this->Common_model->update("users",array('lastUpdate' => DATE("Y:n:d h:i:s")),array('id' => $this->tank_auth->get_user_id()));
		$data=$this->input->post();
		$data['buyer_id']= $this->tank_auth->get_user_id();
		$data['bid_time'] = date('Y-m-d H:i:s');
		$bidding_data=$this->Common_model->getAll("tb_bidding", array('lot_id' => $data['lot_id'],'buyer_id'=>$data['buyer_id']),"DESC","id_bidding","1")->row_array();
			if($bidding_data['bidding_price']==$data['bidding_price']){
				return;
			}
			else{
				$id= $this->Common_model->insert("tb_bidding",$data);
				$info= $this->Common_model->getAll("tb_lot",array("id_lot"=>$data['lot_id']))->row_array();
				$bid = strtotime(date($info['lot_end_date']." ".$info['lot_end_time']));
				$now = strtotime(date('Y-m-d H:i:s'));
				$diff = $bid - $now;
				if($diff < 120)
				{
					 $add = 124 - $diff;
					//$this->Common_model->update("tb_lot",array('lot_end_time'=> date("Y-m-d H:i:s", strtotime($bid + $add))),array('id_lot'=>$data['lot_id']));
					$this->db->query("UPDATE tb_lot SET lot_end_time=(lot_end_time + INTERVAL ".$add." SECOND) WHERE id_lot = ".$data['lot_id']);
					$this->Common_model->update("users",array('lastUpdate' => DATE("Y:n:d h:i:s")),array('id' => $this->tank_auth->get_user_id()));
				}
				if($id > 0){ echo "success"; }else{ echo "failed"; }
			}
		
	}

	function getMyBid(){
		$data=$this->input->post();
		$info= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$data['id_lot'],"buyer_id"=>$this->tank_auth->get_user_id()),"DESC","bidding_price")->row_array();
		if(!empty($info))
		{
			echo json_encode($info);	
		}
		else{
			echo 0;
		}
		
	}

	
}