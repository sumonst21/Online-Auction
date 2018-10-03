
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Generate Report</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Generate Report</li>
            </div>
          </ul>



          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                
                <!-- Modal Form-->
                

                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                     
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">List Of Buyers</h4>
                       <button style="margin-left: 65%;" type="button" class="btn btn-primary">Download CSV</button>
                    </div>
                    <div class="card-body">
                    
                      <table class="table table-striped table-hover">
                       
                          <tr>
                            <td>Auction Type :</td><td><?php echo $lotlist[0]['auction_type']; ?></td>

                          </tr>
                          <tr>
                            <td>Lot Number: </td><td><?php echo $lotlist[0]['lot_number']; ?> </td>
                          </tr>
                          <tr>
                            <td>Description: </td><td><?php echo $lotlist[0]['lot_description']; ?></td>
                          </tr>
                          <tr>
                            <td>Date: </td><td><?php echo $lotlist[0]['bid_time']; ?></td>
                          </tr>
                          <tr>
                            <td>Start Time: </td><td><?php echo $lotlist[0]['auction_start_dt']; ?> / <?php echo $lotlist[0]['auction_start_time']; ?></td>
                          
                            <td>End Time: </td><td><?php echo $lotlist[0]['auction_end_dt']; ?> / <?php echo $lotlist[0]['auction_end_time']; ?></td>
                          </tr>
                          <tr>
                            <th>#</th>
                            <th> Buyer </th>
                            <th> Bid Amount </th>
                            <th> Date / Time </th>
                          </tr>
                          
                          <?php $i=0; foreach ($lotlist as $report) { ?>
                          
                            <tr>
                            <td><?php echo $i=$i+1; ?></td>
                            <td> <?php echo $report['buyer_company_name']; ?> </td>
                            <td style="text-align:center;"> <?php echo $report['bidding_price']; ?> </td>
                            <td> <?php echo $report['bid_time']; ?> </td>
                          </tr>
                          <?php }  ?>
                        </th>

                      </table>
					  
					  
					  
                      
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>