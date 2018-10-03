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
        $buyerId = $this->input->post('buyerId');
		//Function to get info about lot and auction
		$lotdetails= $this->Common_model->getAuctionData($id,$buyerId);
		$highestbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		if(empty($highestbid)){ $highestbid['bidding_price']=0; }
		$yourbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id,"buyer_id"=>$buyerId),"DESC","bidding_price")->row_array();
		if(empty($yourbid)){ $yourbid['bidding_price']=0; }
		$rank = $this->db->query("SELECT buyer_id FROM (SELECT * FROM `tb_bidding` where lot_id ='$id' ORDER BY `bidding_price` DESC) as rank GROUP BY buyer_id ORDER BY bidding_price DESC")->result_array();
		if(!empty($rank))
		{
			$key = array_search($buyerId, $rank);
			$i = 1; foreach ($rank as $key => $value) { if($value['buyer_id'] == $buyerId) { $yourrank = $i; break; }
			else{ $yourrank='0'; } $i +=1; }
		}
		else{
			$yourrank='0';
		}
        $buyers= $this->Common_model->getAll("tb_approved",array("approved_lot_id"=>$id))->row_array();
        $approvedlist = explode(',',$buyers['approved_buyer_id']);
		$buyerstr = "";
        foreach($approvedlist as $list)
        {
            $buyername = $this->Common_model->getAll("tb_buyers",array("buyer_id"=>$list))->row_array();
            $buyerstr .="<option value='".$buyername['buyer_id']."'>".$buyername['buyer_company_name']."</option>";
            
        }
		if($highestbid['bidding_price']==0){ $bidprice =  $lotdetails['lot_start_bid'] ;}
		else { $bidprice = $highestbid['bidding_price'] +  $lotdetails['lot_increment_by'] ; }
		$final = array("startbid"=>$lotdetails['lot_start_bid'],"increment"=>$lotdetails['lot_increment_by'],"startdate"=>$lotdetails['lot_start_date'],"starttime"=>$lotdetails['lot_start_time'],"enddate"=>$lotdetails['lot_end_date'],"endtime"=>$lotdetails['lot_end_time'],"highestbid"=>$highestbid['bidding_price'],"yourbid"=>$yourbid['bidding_price'],"yourrank"=>$yourrank,"bidprice" => $bidprice,"buyerlist"=>$buyerstr);
		
		//echo date("Y-m-d H:i:s",strtotime($lotdetails['lot_end_date']." ".$lotdetails['lot_end_time']));
		if(strtotime(date('Y-m-d H:i:s')) > strtotime($lotdetails['lot_end_date']." ".$lotdetails['lot_end_time']))
		{
			echo 0; 
		}
		else{
			echo json_encode($final);
		}
		
	}
	
	function getLotData()
	{
		
		$id = $this->input->post('lot_id');
		$lotData=$this->Common_model->getAll("tb_lot",array("id_lot"=>$id))->row_array();
		echo json_encode($lotData);
	}


	function allIn($id){
		$user_authenticate=$this->Common_model->getAll("tb_companies",array('company_id'=>$this->tank_auth->get_user_id()))->row_array();
		$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id,"activate"=>'1'))->result_array();
			$data['action']	= base_url()."ViewAuction/activate";
			
			?>

			<table id="BidTable" width="100%" style="border: 5px solid orange;" class="table">
            <thead>
              <tr>
                
                <th style="text-align: center;">Lot No.</th>
                <th>Details</th>
                <th style="text-align: center;">Highest Bid</th>
                <th style="text-align: center;">Bidder</th>
                <th style="text-align: center;">Time Remaining</th>
                
              </tr>
            </thead>
            <tbody>
               <?php
            $i=1; foreach ($data['lotlist'] as $list) { ?>
            
            <?php
        	$id=$list['id_lot'];
        	$approved_id=$this->Common_model->getAll("tb_approved",array('approved_lot_id'=>$id))->row_array();
        //print_r($approved_id);
         $expl=explode(",",$approved_id['approved_buyer_id']);
		 //print_r($expl);

        $lotdetails= $this->Common_model->getAuctionData($id);
		$highestbid= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		$highestbidder_id= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		$highestbidder_name=$this->Common_model->getAll("tb_buyers",array('buyer_id' => $highestbidder_id['buyer_id']))->row_array();
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
                		

                	?>
<script type="text/javascript">
  $('.functn').click(function(){
  	var id = $(this).attr('id');
    $('#mylotid1').val(id);
	
	$.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/getLotData",
                data: {lot_id:id},
                cache: false,
                success: function(resultData) 
                { 
                  if(resultData != 0)
                  {
                    var obj = $.parseJSON(resultData);
                    $("#increment_val").val(obj.lot_increment_by);
					
                  }
                 
                }
          });
	
	
    $('#myModal1').modal('show');
  });
</script>

<script type="text/javascript">
  $('.bidFunctn').click(function(){
  	var id = $(this).attr('id');
    	$('#mylotid2').val(id);
	$.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/allInData",
                data: {id:id},
                cache: false,
                success: function(resultData) 
                { 
                  if(resultData != 0)
                  {
                    var obj = $.parseJSON(resultData);
                    
                    $("#bidderListHere").html(obj.strbid);
                    $('#mylotid2').val(id);
                    $('#bidding_price').val(obj.bidPrice);
                  }
                 
                }
          });
	
	
    $('#myModal2').modal('show');
  });
</script>

                <tr>
                  
                  <td style="text-align: center;"><?php echo $list['lot_number']; ?></td>
                  <td><?php echo $list['lot_description']; ?></td>
              	  <td style="text-align: center; color: red;"><?php echo $final['highestbid']; ?></td>


              	  <td style="text-align: center; color: red;"><?php echo $highestbidder_name['buyer_company_name']; ?></td>


              	  <td style="text-align: center;" <?php if($diff->format('%s') <= '30' && $diff->format('%i')=='0' && $diff->format('%h')=='0') { ?>  style="color: red; font-size: 20px; font-weight: 200%;" <?php } ?> style="font-size: 20px; font-weight: 200%;" > <?php 
                  echo $diff->format('%h : %i : %s');?></td>
                  
                  
                </tr>

                <?php $i=$i+1; }  }?>
            </tbody>
        </table>
	
	<?php } 
	
	function viwewlots($id)
	{
		
		$type=$this->tank_auth->get_user_type();

		if(!$this->tank_auth->is_logged_in()){
			redirect('/auth/login/');
			
		}
		if ($type!='3') {

			redirect('/auth/logout/');
		}
		else
		{

			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			



			$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id))->result_array();


			$data['auctionDetail'] = $this->Common_model->getAll("tb_manage_auctions",array("id_m_a"=>$id))->row_array();

			$data['bidderList'] = $this->Common_model->getAll("tb_buyers")->result_array();
			
			$data['add_increment']= base_url()."index.php/ViewAuction/add_increment";
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('selectLot',$data);
				$this->load->view('common/footer');
		}
		
	}

	function viwewlotsDetails($id)
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			
			$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id))->result_array();
			foreach($data['lotlist'] as $arrLotList){
				//echo $arrLotList['lot_description'];
			$data['lotData'] = $this->Common_model->getAllData("tb_bidding",array("lot_id"=>$arrLotList['id_lot']),"ASC","id_bidding")->result_array();
			foreach($data['lotData'] as $printData){
			
			}
			}
			//$data['action']	= base_url()."ViewAuction/getList";
			//$data['bidderList'] = $this->Common_model->getAll("tb_buyers")->result_array();
		
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('detailTable',$data);
				$this->load->view('common/footer');
			
		
	}
	function getList($id_lot){
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['lotData'] = $this->Common_model->getAllData("tb_bidding",array("lot_id"=>$id_lot),"ASC","id_bidding")->result_array();
		
		$this->load->view('common/header', $data);
		$this->load->view('common/nav');
		$this->load->view('detailTable',$data);
		$this->load->view('common/footer');


	}

	function add_time(){
		$data=$this->input->post();
		$data['lot_start_time'] = date('H:i:s',strtotime($data['lot_start_time']));
		$data['lot_end_time'] = date('H:i:s',strtotime($data['lot_end_time']));
		$upd = $this->Common_model->update("tb_lot",$data,array('id_lot'=>$data['id_lot']));

		$lot=$this->Common_model->getAll("tb_lot",array("id_lot"=>$data['id_lot']))->row_array();
		redirect (base_url('index.php/ViewAuction/viwewlots/'.$lot['auction_id']));
	}
	function add_increment(){
		$data=$this->input->post();
		//print_r($data);
		$upd = $this->Common_model->update("tb_lot",$data,array('id_lot'=>$data['id_lot']));
		$lot=$this->Common_model->getAll("tb_lot",array("id_lot"=>$data['id_lot']))->row_array();
		redirect (base_url('index.php/ViewAuction/viwewlots/'.$lot['auction_id']));
	}
	function viewBuyerLots($id)
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['auction_id'] =$id;
			$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id))->result_array();
			
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('select_lot_for_bidders',$data);
				$this->load->view('common/footer');
			
		
	}
	function viewBiddersList($id,$lot_id)
	{
		
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['auction_id'] =$id;
		$data['id_lot'] = $lot_id;
		$data1 = $this->Common_model->getAllBidder("tb_buyer_invite",array("buyer_invite_auction_id"=>$id))->row_array();
		$data['data2']=explode(',', $data1['buyer_invite_buyer_id']);
		$data['add_approval']=base_url().'index.php/ViewAuction/add_approval';
		
		
		
	// 	foreach ($data['bidder_id'] as $details){
	// 	$data['fullDetail'] = $this->Common_model->getAll("tb_buyers",array('buyer_id' => $details['bidder_id']))->row_array();
	// }
		//print_r($data['fullDetail']);
			$this->load->view('common/header', $data);
			$this->load->view('common/nav');
			$this->load->view('approve_bidders',$data);
			$this->load->view('common/footer');
			
		
	}
	public function add_approval(){
		
		$data['approved_buyer_id']=implode(',', $this->input->post('buyer'));

		$data['approved_lot_id'] = $this->input->post('id_lot');

		
		$check = $this->Common_model->getAll("tb_approved",array('approved_lot_id' =>$data['approved_lot_id']))->row_array();
		 if($check!=null){
			$upd = $this->Common_model->update("tb_approved",$data,array("approved_lot_id"=>$data['approved_lot_id']));
		 }
		 else{
		 	$ins = $this->Common_model->insert("tb_approved",array('approved_lot_id' =>$data['approved_lot_id'] , 'approved_buyer_id'=>$data['approved_buyer_id']));
		 }
		

		redirect(base_url('index.php/approve_buyers'));
	}
	
	function getLots($id)
	{
		
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['add_lot']	= base_url().'index.php/Manage_auctions/add_lot';
			$data['edit']	= base_url().'index.php/Manage_auctions/edit';
			$data['delete']	= base_url().'index.php/Manage_auctions/delete';
			$data['lotlist'] = $this->Common_model->getAll("tb_lot",array("auction_id"=>$id))->result_array();
			$data['action']	= base_url()."ViewAuction/activate";
			$data['bidderList'] = $this->Common_model->getAll("tb_buyers")->result_array();
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('getLots',$data);
				$this->load->view('common/footer');
			
		
	}
	function generateReport($id,$lot)
	{
		
			
			$data['lotlist'] = $this->Common_model->getAllJoin("tb_lot",array("auction_id"=>$id,"id_lot"=>$lot))->result_array();
			
				$this->load->view('common/header', $data);
				$this->load->view('common/nav');
				$this->load->view('report',$data);
				$this->load->view('common/footer');
			
		
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
	function biddingData()
	{
		$id=$this->input->post('id_lot');
		$info= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$id),"DESC","bidding_price")->row_array();
		echo json_encode($info);
		
	}
	function insertBid()
	{
		$id = 0;
		$data=$this->input->post();
		//$data['buyer_id']= $this->tank_auth->get_user_id();
		$data['bid_time'] = date('Y-m-d H:i:s');
		$latestbuyer = $this->db->query("select buyer_id from tb_bidding where lot_id='".$data['lot_id']."' order by id_bidding DESC")->row_array();
        if($latestbuyer['buyer_id'] != $data['buyer_id'])
		{
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
			}
		}
		
		if($id > 0){ echo "success"; }else{ echo "failed"; }
		
		
	}

	function getMyBid(){
		$data=$this->input->post();
		$info= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$data['id_lot'],"buyer_id"=>$data['buyer_id']),"DESC","bidding_price")->row_array();
		echo json_encode($info);
	}
	
	function deleteBid($id_bidding,$id_lot){
		//print_r($id_bidding);
		$delete=$this->Common_model->delete("tb_bidding",array("id_bidding"=>$id_bidding));
		$lot=$this->Common_model->getAll("tb_lot",array("id_lot"=>$id_lot))->row_array();
		redirect (base_url('index.php/ViewAuction/viwewlots/'.$lot['auction_id']));
	}
	
	function getLogs()
	{
		

		$data=$this->input->post();
		$info= $this->Common_model->getAll("tb_bidding",array("lot_id"=>$data['id_lot']),"DESC","bidding_price")->result_array();
		$i=0;
		?>
		<table class="table table-striped">
		<thead>
                          <tr>
                            <th>#</th>
                            <th>Highest Bid</th>
                            <th>Bidder ID</th>
                            <th>Time of Bid</th>
							<th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
		<?php
		foreach($info as $in)
		{
			$name = $this->Common_model->getAll("tb_buyers",array("buyer_id"=>$in['buyer_id']))->row_array();

			?>
				
                        
                          <tr>
                            <th scope="row"><?php echo $i=$i+1; ?></th>
                            <td><b><?php echo $in['bidding_price']; ?></b></td>
                            <td><b><?php echo $name['buyer_company_name']; ?></b></td>
                            <td><b><?php echo $in['bid_time']; ?></b></td>
							<td>
                              <b><button class="btn-danger" onclick="window.location.href='<?php echo base_url(); ?>ViewAuction/deleteBid/<?php echo $in['id_bidding'];?>/<?php echo $in['lot_id'];?>'">Delete</button>
                            </b>
							</td>
                          </tr>
                         
                        
			<?php

		}
		?>
		</tbody>
                      </table>
                      <?php
		
	}


	
}