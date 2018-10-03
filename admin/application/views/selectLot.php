<!-- For Admin -->
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Select Lot For Bidding</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php $title=$this->Common_model->getAll("tb_manage_auctions",array('id_m_a' => $lotlist[0]['auction_id']))->row_array(); echo $title['auction_number'];?></li>
            </div>
          </ul>




          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
              
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                     
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">Auction</h4>
                       
                       </a>
                    </div>



                    <div class="card-body">
			        	<div class="bidTable"></div>
			      	</div>
                      






                    <div class="card-body">
                      <table class="table table-striped table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>Title</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($lotlist as $list) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['lot_description']; ?></td>
                          <td>

                          <button class="btn btn-<?php if($list['activate']==0){ echo "primary"; }else{ echo "success"; } ?>" onclick="window.location.href='<?php echo $action."/".$list['id_lot']."/".$list['activate']."/".$list['auction_id']; ?>'"><?php if($list['activate']==0){ echo "Activate"; }else{ echo "Close Bid"; } ?></button></td>

                          <td>
                           <?php if($list['activate']==1){ ?> <a href="#dashboardData"><button class="btn btn-secondary startbid" id="<?php echo $list['id_lot'];?>"  onclick="bid('<?php echo $list['id_lot'];?>',0)">Dashboard</button></a> <?php } ?>
                          </td>
                          <td>
                          <button type="button" id="<?php echo $list['id_lot']; ?>" class="showmodal btn btn-primary">Set Time</button>
                            
                          </td>
						  <td><button type="button" id=" <?php echo $list['id_lot']; ?>" class="incrementModal btn btn-primary">Increment Value</button></td>
                          <input type="hidden" id="end_date" value="<?php echo $list['lot_end_date']; ?>">
                        </tr>

                        <?php $i=$i+1; } ?>
                        </tbody>

                      </table>

                    </div>

<script type="text/javascript">
  $('.showmodal').click(function(){
    var id = $(this).attr('id');
    $('#mylotid').val(id);
	
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
                    // if(obj.lot_start_date==""){
                    //     $("#lot_start_date").val(<?php echo date("'Y/m/d'"); ?>);
                    // }
                    // else if(obj.lot_start_time==""){
                    //     $("#lot_start_time").val(<?php echo date("'H:i:s'"); ?>);
                    // }
                    // else if(obj.lot_end_date==""){
                    //     $("#lot_end_date").val(<?php echo date("'Y/m/d'"); ?>);
                    // }
                    // else if(obj.lot_end_time==""){
                    //     $("#lot_end_time").val(<?php echo date("'H:i:s'"); ?>);
                    // }
                    // else{
                        $("#lot_start_date").val(obj.lot_start_date);
                        $("#lot_start_time").val(obj.lot_start_time);
                        $("#lot_end_date").val(obj.lot_end_date);
                        $("#lot_end_time").val(obj.lot_end_time);
                    //}
					
                  }
                 
                }
          });
	
	
    $('#myModal').modal('show');

  });
</script>
<script type="text/javascript">
  $('.incrementModal').click(function(){
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



                  </div>
                </div>

            <!---dashboard start -->
            <div class="col-lg-12" class="dashboard_bid" id="dashboard_bid">
                  <div class="card">
                    <div class="card-close">
                     
                    </div>
                    <div class="card-header d-flex align-items-center" id="dashboardData">
                      <i class="fa fa-tachometer" aria-hidden="true"></i><h4 class="h4"> &nbsp;Bidding Dashboard</h4>
                       
                       </a>
                    </div>

          <section>   
                <div class="col-lg-12">
                  <div align="center" style="margin-top: -5%; background-color: #ffad72">
                          <i class="fa fa-clock-o"></i>
                          <span style="color: white; font-size: 20px;">Time Information</span>
                        </div>
                      <table style="border-color: #616ae8; border-style: solid; width: 100%;">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Start Time</th>
                            <th style="text-align: center;">End Time</th>
                            <th style="text-align: center;">Remaining Time</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <b><td id="start_time" style="text-align: center; font-size: 20px;">0</td></b>
                            <b><td id="end_time" style="text-align: center; font-size: 20px;">0</td></b>
                            <b><td id="remaining_time" style="text-align: center; font-size: 25px; color: red;">0</td></b>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  
             
          </section>
          

                    
                    <div class="col-lg-12 row" style="margin-top: -5%; margin-right: 5%;">
                      <div class="col-lg-6" style="margin-right: -3%;">
                        <div align="center" style="background-color: #ffad72;">
                          <i class="fa fa-table"></i>
                          <span style="color: white; font-size: 20px;">Bidding Information</span>
                        </div>
                       <table class="table" style="border-style: solid; border-color: #616ae8;">
                         
                          <tr>
                            <td>
                              <span style="font-size: 17px;">Highest Bid</span>
                              <br>
                              <span style="font-size: 17px;">Your Bid</span>
                              <br>
                              <span style="font-size: 17px;">Increment Value</span>
                              <br>
                              <span style="font-size: 17px;">Start Bid</span>
                            </td>
                            <td>
                              <b><span id="highest" style="font-size: 17px;">0</span></b>
                              <br>
                              <b><span id="your_bid" style="font-size: 17px;">0</span></b>
                              <br>
                              <b><span id="increment" style="font-size: 17px;">0</span></b>
                              <br>
                              <b><span id="start_bid" style="font-size: 17px;">0</span></b>
                            </td>
                          </tr>
                          
                          
                        </table>
                     </div>
                     <div class="col-lg-6" style="width: 120%;">
                      <div align="center" style="background-color: #ffad72; width: 113%;">
                          <i class="fa fa-send"></i>
                          <span style="color: white; font-size: 20px;">User Actions</span>
                        </div>
                       <table style="border-color: #616ae8; border-style: solid; width: 113%;">
                          <tr>
                            <th style="text-align: left;">Select Bidder For Auction</th>
                            <th style="text-align: left;"><select id="buyerId"></select></th>
                          </tr>
                          <tr>
                            <td>
                              <input type="hidden" value="" id="lot_id">
                              <input type="text" class="form-control" readonly="readonly" value="0" id="manual_bid">
                            </td>
                            <td>
                               <button type="button" id="goButton" class="btn btn-danger" style="width: 100%;" onclick="sendBid(document.getElementById('manual_bid').value)">Go!</button>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <br>
                              <span style="font-size: 17px;">Selected Lot Details</span>
                              <br>
                            </td>
                            <td>
                              <br>
                               <b><span id="ak_desc" style="font-size: 17px;"></span></b>
                              <br>
                            </td>
                          </tr>
                          
                        </table>
                     </div>
                    </div>
                     
                     

                    
                    
                    




          <section class="dashboard-header" style="margin-top: -1.5%;">
            <div class="container-fluid">
                <div id="info"></div>

                <div style="margin-top: -5%; margin-left: -1.5%; background-color: #ffad72; width: 102.8%;">
                  <h3 align="center" style="color: white; font-size: 20px;">
                  <i class="fa fa-sort-amount-desc"></i>Activity Logs</h3>
                </div>
                <div class="showlogs" style="border-style: solid; border-color: #616ae8; margin-top: -0.9%; width: 102.8%; margin-left: -1.5%;"></div>


              </div>
            </div>
          </section>

                    


                  </div>
                </div>
            <!---dashboard end ---->
              </div>
            </div>
          </section>



  <!---modal --->
  <!-- Modal Form-->
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-close">
                      
                   
                    
                      <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Change Time Here</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                
                                    <label class="col-sm-12 form-control-label">Please Fill Details</label>
                                  
                                    <div class="col-sm-12">

                                    <?php echo form_open_multipart($add_time); ?>
                                    <input type="hidden" value="" id="mylotid" name="id_lot" />

                                    <div class="form-group-material">
                                      <table style="border: 1px solid black; width:100%;">
									  
                                      <tr style="border: 1px solid black;">
                                        <td style="border: 1px solid black; text-align:center; color:green;">Start Date</td>
										<td style="border: 1px solid black; text-align:center;"><input type="text" readonly="readonly" name="lot_start_date" id="lot_start_date" class="datepicker input-material" autocomplete="off"></td>
                                        <td style="border: 1px solid black; text-align:center;"></td>
                                        <td style="border: 1px solid black; text-align:center; color:green;">Start Time</td>
                                        <td style="border: 1px solid black; text-align:center;"><input type="text" name="lot_start_time" id="lot_start_time" class="timepicker input-material" autocomplete="off"></td>
                                      </tr>
                                      <tr style="border: 1px solid black;">
                                        <td style="border: 1px solid black; text-align:center; color:red;">End Date</td>
										<td style="border: 1px solid black; text-align:center;"><input  type="text" readonly="readonly" id="lot_end_date" name="lot_end_date"  class="datepicker input-material" autocomplete="off"></td>
                                        <td style="border: 1px solid black; text-align:center;"></td>
                                        <td style="border: 1px solid black; text-align:center; color:red;">End Time</td>
                                        <td style="border: 1px solid black; text-align:center;"><input  type="text" name="lot_end_time" id="lot_end_time" class="timepicker input-material" autocomplete="off"></td>
                                      </tr>
                                    </table>
                                                                        
                                  </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                              
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div></div>     

<!---modal --->
  <!-- Modal Form-->
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-close">
                      
                   
                    
                      <!-- Modal-->
                      <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Change Increment Value</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                
                                   
                                  
                                    <div class="col-sm-12">

                                    <?php echo form_open_multipart($add_increment); ?>
                                    <input type="hidden" value="" id="mylotid1" name="id_lot" />

                                    <div class="form-group-material">
                                      <table style="border: 1px solid black; width:100%;">
                                      <tr style="border: 1px solid black;">
                                        
                                        <td style="text-align:center; border: 1px solid black; color:red;">Change Increment</td>
                                        <td style="text-align:center; border: 1px solid black; color:red;"><input type="text" id="increment_val" placeholder="Increment Value" name="lot_increment_by"  class="input-material"></td>
                                      </tr>
                                      
                                    </table>
                                                                        
                                  </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                              
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div></div>

<!-- Modal Form-->
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-close">
                      
                   
                    
                      <!-- Modal-->
                      <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Send Bid</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                
                                   
                                  
                                    <div class="col-sm-12">

                                    
                                    
					<?php echo form_open_multipart($addBid); ?>
                                    <div class="form-group-material">
                                      <table style="border: 1px solid black; width:100%;">
                                      <tr style="border: 1px solid black;">
                                        <th>Select Bidder</th>
                                        <th>Bid Amount</th>
                                        <th>Bid</th>
                                      </tr>
                                      <tr style="border: 1px solid black;">
                                      	<input type="hidden" value="" id="mylotid2" name="id_lot" />
                                        <td style="text-align:center; border: 1px solid black; color:red;"><select id="bidderListHere" name="buyer_id"></select></td>
                                        
                                        <td style="text-align:center; border: 1px solid black; color:red;"><input type="text" id="bidding_price" name="bidding_price" value="0"></td>
                                        
                                        <td style="text-align:center; border: 1px solid black; color:red;"><button>BID</button></td>
                                      </tr>
                                      
                                    </table>
                                                                        
                                  </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div></div>   

<script type="text/javascript">
  window.onload = showBidTable(<?php echo $title['id_m_a']; ?>);

  function showBidTable(id){
      var timer;

      timer = setInterval(() => 
        $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/allIn/"+id,
                //data: {id_lot:id},
                success: function(resultData) { 
                  
                 $('.bidTable').html(resultData);
                  
              }
          })
        , 500);
              
  }//function close


</script>  


<script type="text/javascript">
  $('.addBid').click(function(){
 
    return false;
    $('#myModal2').modal('hide');
    //$('#myModal2').modal('show');

  });
</script>