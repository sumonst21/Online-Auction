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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            
                            <th>Date and Time</th>
                            <th>Select</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($auctionList as $list) { 

                          $invitedList = $this->Common_model->getAll("tb_buyer_invite",array('buyer_invite_auction_id'=>$list['id_m_a']))->row_array();
                          $arr=explode(',', $invitedList['buyer_invite_buyer_id']);
                          
                          if(!in_array($this->tank_auth->get_user_id(), $arr)){
                            continue;
                          }
                          ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['auction_number']; ?></td>
                          <td><?php echo $list['auction_description']; ?></td>
                          <td><?php if ($list['auction_type']=='1'){ echo "Forward"; } else{ echo "Reverse";} ?></td>
                          
                          <td><?php echo $list['auction_start_dt']." ".$list['auction_start_time']; ?></td>
                          <td>
                            <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>ViewAuction/viwewlots/<?php echo $list['id_m_a']; ?>'">Bid Here</button>
                          </td>
                        </tr>

                        <?php $i=$i+1; } ?>
                        </tbody>

                      </table>
    </div>
  </div>
  </div>

