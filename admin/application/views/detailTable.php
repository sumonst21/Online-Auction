
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Print the Data</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Complete Auction after Bidding</li>
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
                      <button id="export" data-export="export">Export as CSV</button>
                      <script type="text/javascript">
                        $("#export").click(function(){
                          $("#dataCSV").tableToCSV();
                        });
                      </script>
                      <table border="1" width="100%" id="dataCSV">
                       
						
						<?php
						foreach($lotlist as $printData){ ?>
						
						<thead>
                          <tr>
                            <td>Description</td>
                            <td><?php echo $printData['lot_description']; ?></td>
                            <td>Type</td>
                            <td>Forward</td>
                          </tr>
                          <tr>
                            <td>Date Of Auction</td>
                            <td><?php echo $printData['lot_start_date']; ?></td>
                            <td>Lot Number</td>
                            <td><?php echo $printData['lot_number']; ?></td>
                          </tr>
						  
                          <tr>
                            <td><b>#</b></td>
                            <td><b>Buyer</b></td>
                            <td><b>Amount</b></td>
                            <td><b>Date / Time</b></td>
                          </tr>
                        </thead>
                        <?php $i=1; 
						$data['lotData'] = $this->Common_model->getAllData("tb_bidding",array("lot_id"=>$printData['id_lot']),"DESC","id_bidding")->result_array();
			foreach($data['lotData'] as $printData1){ ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $printData1['buyer_company_name']; ?></td>
                            <td><?php echo $printData1['bidding_price']; ?></td>
                            <td><?php echo $printData1['bid_time']; ?></td>
                          </tr> 
						  
						  
                         <?php $i=$i+1; } ?>
							<tr>
						              <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
						</tr>
						<tr>
						              <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
						</tr>
						<?php } ?>

                      </table>

                    </div>
                  </div>
                </div>

            <!---dashboard start -->
            
              </div>
            </div>
          </section>

  