<?php header("refresh: 60;"); ?>
<div class="container-fluid col-lg-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
      	<div class="col-lg-4">
      		<h4 class="h4">Bid Here for <?php echo $auctionDetail['auction_number']; ?></h4>
      	</div>
      	<div class="col-lg-4">
      		<h4 class="h4" style="text-align: center;">Company:  <?php $company= $this->Common_model->getSeller($auctionDetail['id_m_a']); echo $company['seller_company_name']; ?></h4>
      	</div>
      	<div class="col-lg-4">
      		<h4 class="h4" style="text-align: right;">Welcome : <?php $buyer=$this->Common_model->getBuyer($username); echo $buyer['buyer_company_name']; ?></h4>
      	</div>
      </div>
      <div class="card-body">
        <div class="bidTable"></div>
      </div>
  </div>
</div>
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
<script type="text/javascript">
  window.onload = showBidTable(<?php echo $auctionDetail['id_m_a']; ?>);

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
        , 1000);
              
  }//function close


</script>


