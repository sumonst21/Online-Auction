<?php header("refresh: 60;"); ?>
<div class="container-fluid col-lg-12">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <div class="col-lg-4">
          <h4 class="h4">Bid is Live</h4>
        </div>
        
        <div class="col-lg-4">
          <h4 class="h4" style="text-align: right;">Welcome : <?php echo $username; ?></h4>
        </div>
      </div>
      <div class="card-body">
        <div class="bidTable"></div>
      </div>
  </div>
</div>
<!-- Modal Form-->
                
                  
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


