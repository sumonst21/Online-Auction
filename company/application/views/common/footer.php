<!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>NNBID Company Name &copy; 2017</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Akshay Kankal</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <style>
    .ui-timepicker-container{ 
     z-index:1151 !important; 
}
  </style>
    <script src="<?php echo base_url('assets/'); ?>js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/jquery.cookie.js"> </script>
    <script src="<?php echo base_url('assets/'); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/front.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/jquery.tabletoCSV.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.min.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.min.js"></script>
    <script>
  $( function() {
    $( ".datepicker" ).datepicker( {dateFormat: 'yy-mm-dd' });
    $('.timepicker').timepicker({
        template: 'modal',
        timeFormat: 'h:mm p',
        interval: 01,
        minTime: '08',
        maxTime: '6:00pm',
        defaultTime: '<?php echo date('H:i A'); ?>',
        startTime: '08:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    
  } );
  </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.timepicker').css('z-index',999999);
      $('.live').click(function(){
        var r = confirm("Do you want to make this auction live?");
        var btn =$(this).text(); 
        var id = $(this).attr('id');
        var val = 0;
        if (r==true) {

          if(btn=='Hold')
                  {
                      //$(this).text("Live"); 
                      val = 0;
                  }
                  if(btn=="Live")
                  {
                      // $(this).class("btn btn-success live")
                      // $(this).text("Hold"); 
                      val = 1;
                  }

          $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/Manage_auctions/make_live",
                data: {id_m_a:id,live:val},
                success: function(resultData) { 
                  location.reload();
                                 }
          });
        }else{

        }
          
      });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
      $('.archive').click(function(){
        var r = confirm("Do you want to archive this auction?");
        var btn =$(this).text(); 
        var id = $(this).attr('id');
        var val = 1;
        if (r==true) {
          $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/Manage_auctions/make_archive",
                data: {id_m_a:id,archive:val},
                success: function(resultData) { 
                  location.reload();
                                 }
          });
        }else{

        }
          
      });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
      $('.delete').click(function(){
        var r = confirm("Do you want to delete this auction forever?");
        var btn =$(this).text(); 
        var id = $(this).attr('id');
        var val = 0;
        if (r==true) {

          $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/Manage_auctions/make_delete",
                data: {id_m_a:id,status:val},
                success: function(resultData) { 
                  location.reload();
                                 }
          });
        }else{

        }
          
      });
    });
    </script>

    <!---->

    <script type="text/javascript">
      $(document).ready(function(){
      $('.add_buyer').click(function(){
        var r = confirm("Do you want to invite this buyer for Auction?");
        var btn =$(this).text(); 
        var id = $(this).attr('id');
        var val =$(this).val();
        if (r==true) {

          
          $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/Manage_auctions/buyer_add_function",
                data: {buyer_invite_auction_id:val,buyer_invite_buyer_id:id},
                success: function(resultData) { 
                  $this.hide();
                                 }
          });
        }else{

        }
          
      });
    });
    </script>

<!---Bidding Functions-->
<script type="text/javascript">
  var timer;
  
  function bid(id,status){
  	$('#lot_id').val(id);

      //window.location.href="#dashboard_start";
      clearInterval(timer);
      for(i=0; i<100; i++)
      {
        window.clearInterval(i);
      }
      
      $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/allinone",
                data: {lot_id:id,buyerId:$('#buyerId').val()},
                cache: false,
                success: function(resultData) 
                { 
                  if(resultData != 0)
                  {
                    var obj = $.parseJSON(resultData);
                    $("#start_time").text(obj.starttime);
                    $("#end_time").text(obj.endtime);
                    $("#start_bid").text(obj.startbid);
                    $("#increment").text(obj.increment);
                    $("#your_bid").text(obj.yourbid);
                    $("#rank").text(obj.yourrank);
                    $("#highest").text(obj.highestbid);
                    $("#manual_bid").val(obj.bidprice);
                   if(status==0){ $("#buyerId").html(obj.buyerlist); }
                    showlogs(id);
                    getTimeRemaining(obj.enddate+" "+obj.endtime,id);
                  }
                  else{
                     for(i=0; i<100; i++)
                      {
                        window.clearInterval(i);
                      }
                      
                      $("#dashboard_bidding_main").hide();
                      alert("Bidding is closed !!");
                      }
    
                }
          });
    }

    function getTimeRemaining(endtime,id)
    {

      var countDownDate = new Date(endtime).getTime();
      // Update the count down every 1 second
      timer = setTimeout(function() {
          // Get todays date and time
          var now = new Date().getTime();
          // Find the distance between now an the count down date
          var distance = countDownDate - now;
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          // Output the result in an element with id="demo"
          document.getElementById("remaining_time").innerHTML =  hours + ":"
          + minutes + ":" + seconds;
          bid(id,1);
          // If the count down is over, write some text 
              if (distance < 0) {
                document.getElementById("remaining_time").innerHTML = "EXPIRED";
                  clearInterval(timer);
                $("#dashboard_bidding_main").hide();
               // alert("Bidding is closed !!");
              }
              
        }, 1000);
    }


     function sendBid(amount)
     {
      if (amount==0) {
       return false;
      }
      else if(amount > +($("#highest").text()))
      {

          $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/insertBid",
                data: {lot_id:$('#lot_id').val(),bidding_price:amount,buyer_id:$('#buyerId').val()},
                cache: false,
                success: function(resultData) { 
                  if(resultData=='failed'){ alert("Please Select Another Bidder."); }
              }
          });
      }
      else{
        $("#status_msg").text("Amount Must Be greater Than  "+$("#highest").text());
      }
    }
     function showlogs(id){
      $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/getLogs",
                data: {id_lot:id},
                success: function(resultData) { 
                  
                 $('.showlogs').html(resultData);
                  
              }
          });
    }
</script>

  </body>
</html>