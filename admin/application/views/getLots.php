
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Get Lots Report</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>

              <li class="breadcrumb-item active">Get Lot Report</li>
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
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($lotlist as $list) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['lot_number']; ?></td>
                          <td>
                          <button class="btn btn-secondary" onclick="window.location.href='<?php echo base_url(); ?>ViewAuction/generateReport/<?php echo $list['auction_id']; ?>/<?php echo $list['id_lot']; ?>'">Generate Report</button>
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
