<!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>NNBID Company Name &copy; 2017</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery-ui.js"></script>
    <script src="<?php echo asset_url(); ?>js/tether.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/jquery.cookie.js"> </script>
    <script src="<?php echo asset_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/front.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>





    <!---->
<script type="text/javascript">

  

//console.log(array_lot);
// window.onload = array_lot.forEach(bid);


  
  // function bid(id){
      
  //     //$('#lot_id').val(id); //hiding it now at 2:49 AM
      

  //     //window.location.href="#dashboard_start";
  //     clearInterval(timer);
  //     for(i=0; i<100; i++)
  //     {
  //       window.clearInterval(i);
  //     }

      
  //     // $.ajax({
  //     //           type: 'POST',
  //     //           url: "<?php echo base_url(); ?>index.php/ViewAuction/allinone",
  //     //           data: {lot_id:id},
  //     //           cache: false,
  //     //           success: function(resultData) 
  //     //           { 
  //     //             if(resultData != 0)
  //     //             {
  //     //               var obj = $.parseJSON(resultData);
  //     //               $("#lot_product_qty"+id).text(obj.lot_product_qty);
  //     //               $("#start_time"+id).text(obj.starttime);
  //     //               $("#end_time"+id).text(obj.endtime);
  //     //               $("#start_bid"+id).text(obj.startbid);
  //     //               $("#increment"+id).text(obj.increment);
  //     //               $("#your_bid"+id).text(obj.yourbid);
  //     //               $("#rank"+id).text(obj.yourrank);
  //     //               $("#highest"+id).text(obj.highestbid);
  //     //               $("#manual_bid"+id).val(obj.bidprice);
  //     //               //console.log(obj.starttime);
  //     //               // console.log(obj.endtime);
  //     //               // console.log(obj.startbid);
  //     //               // console.log(obj.increment);
  //     //               // console.log(obj.yourbid);
  //     //               //$('#BidTable').append('<tr><td>test 2</td></tr>')
  //     //               //console.log(obj.yourrank);
  //     //               // console.log(obj.highestbid);
  //     //               // console.log(obj.bidprice);
  //     //               if(obj.yourrank!=1)
  //     //               {
  //     //                 $('.chart'+id).show();
  //     //               }
  //     //               else
  //     //               {
  //     //                 $('.chart'+id).hide();
  //     //               }
  //     //               getTimeRemaining(obj.enddate+" "+obj.endtime,id);
  //     //             }
  //     //             else{
  //     //                for(i=0; i<100; i++)
  //     //                 {
  //     //                   window.clearInterval(i);
  //     //                 }
                      
  //     //                 $("#dashboard_bidding_main").hide();
  //     //                 $("#row"+id).hide();
  //     //                 //alert("Bidding is closed !!");
  //     //                 }
    
  //     //           }
  //     //     });
  //   }

    // function getTimeRemaining(endtime,id)
    // {

    //   var countDownDate = new Date(endtime).getTime();
    //   // Update the count down every 1 second
    //   timer = setTimeout(function() {
    //       // Get todays date and time
    //       var now = new Date().getTime();
    //       // Find the distance between now an the count down date
    //       var distance = countDownDate - now;
    //       // Time calculations for days, hours, minutes and seconds
    //       var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //       var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //       var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //       var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    //       // Output the result in an element with id="demo"
    //       document.getElementById("remaining_time"+id).innerHTML =  hours + ":"
    //       + minutes + ":" + seconds;
    //       //bid(id);
    //       array_lot.forEach(bid);
    //       // If the count down is over, write some text 
    //           if (distance < 0) {
    //             document.getElementById("remaining_time").innerHTML = "EXPIRED";
    //               clearInterval(timer);
    //             $("#dashboard_bidding_main").hide();
    //             $("#row"+id).hide();
    //            // alert("Bidding is closed !!");
    //           }
              
    //     }, 1000);
    // }


     function sendBid(idLot,amount)
     {
      if (amount==0) {
       return false;
      }
      else if(amount > +($("#highest").text()))
      {

          $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/ViewAuction/insertBid",
                //data: {lot_id:$('#lot_id').val(),bidding_price:amount},
                data: {lot_id:idLot,bidding_price:amount},
                cache: false,
                success: function(resultData) { 
                  if(resultData=='success')
                  {
                    $('.chart'+idLot).hide();
                  }
                  // alert("Bidd Succesful with value: "+amount);
                 // $("#status_msg").text("Bid Successful with price: "+amount);
                  //bid($('.startbid').attr('id'));

              }
          });
      }
      else{
        $("#status_msg").text("Amount Must Be greater Than  "+$("#highest").text());
      }
    }
</script>

  </body>
</html>