
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          
          <section class="tables" style="margin-top: -3.5%; margin-left: -2%;">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-striped table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>Live Auctions</th>
                            <th>Description</th>
                            <th>Type</th>
                           
                            <th>Date and Time</th>
                            <th>Select</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($auctionList as $list) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['auction_number']; ?></td>
                          <td><?php echo $list['auction_description']; ?></td>
                          <td><?php if ($list['auction_type']=='1'){ echo "Forward"; } else{ echo "Reverse";} ?></td>
                          
                          <td><?php echo $list['auction_start_dt']." ".$list['auction_start_time']; ?></td>
                          <td>
                            <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>ViewAuction/viwewlots/<?php echo $list['id_m_a']; ?>'">View Auction</button>
                          </td>
                        </tr>

                        <?php $i=$i+1; } ?>
                        </tbody>

                      </table>
                
				
				
             </div> 
              </div>
            </div>
          </section>