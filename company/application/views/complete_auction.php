
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Complete Auction After Bidding</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Complete Auction After Bidding</li>
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
                        <?php $i=1; foreach ($auctionList as $list) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['auction_number']; ?></td>
                          <td><?php echo $list['auction_description']; ?></td>
                          <td><?php if ($list['auction_type']=='1'){ echo "Forward"; } else{ echo "Reverse";} ?></td>
                          
                          <td><?php echo $list['auction_start_dt']." ".$list['auction_start_time']; ?></td>
                          <td>
                            <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>ViewAuction/viwewlotsDetails/<?php echo $list['id_m_a']; ?>'">Get CSV</button>
                          </td>
                        </tr>

                        <?php $i=$i+1; } ?>
                        </tbody>

                      </table>
                      
                      
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>
