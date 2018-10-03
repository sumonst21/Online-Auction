<div class="container-fluid col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
                      <h4 class="h4">List Of Auctions</h4>
        </div>
        <div class="card-body">
      <table class="table table-striped table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>Live Auctions </th>
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

