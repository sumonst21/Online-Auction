
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Select Lot for Bidding</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Select Lot For Bidding</li>
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
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($lotlist as $list) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['lot_number']; ?></td>
                          <td><?php echo $list['lot_description']; ?></td>
                         

                          

                          <td>
                           <?php
                            $buyers= $this->Common_model->getAll("tb_approved",array("approved_lot_id"=>$list['id_lot']))->row_array();
                            $approvedlist = explode(',',$buyers['approved_buyer_id']);
                            ?>
                           <?php if(in_array($this->tank_auth->get_user_id(),$approvedlist)){  if($list['activate']==1){ ?> <button class="btn btn-secondary startbid" id="<?php echo $list['id_lot'];?>" onclick="bid(<?php echo $list['id_lot'];?>)" name="<?php echo $list['id_lot'];?>">Bid</button> <?php }} ?>
                          </td>

                        </tr>

                        <?php $i=$i+1; } ?>
                        </tbody>

                      </table>

                    </div>




                  </div>
                </div>

                <div class="col-lg-12" id="dashboard_bidding_main">
                  <div class="card"> 
                    <div class="card-close">
                     
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4" id="dashboard_start">Bidding Dashboard</h4>
                       
                       </a>
                    </div>
          <section class="dashboard-counts no-padding-bottom" >
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Start Bid</span>
                    
                    </div>
                    <div class="number" id="start_bid"><strong>0</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Current Bid</span>
                      
                    </div>
                    <div class="number" id="highest"><strong>0</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Your Rank</span>
                      
                    </div>
                    <div class="number" id="rank"><strong>0</strong></div>
                  </div>
                </div>
                 <!-- Item -->

                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Increment Value</span>
                    
                    </div>
                    <div class="number" id="increment"><strong>0</strong></div>
                  </div>
                </div>
                

                 <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-bill"></i></div>
                    <div class="title"><span>Your Bid</span>
                      
                    </div>
                    <div class="number" id="your_bid"><strong>0</strong></div>
                  </div>
                </div>
               
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Remaining Time</span>
                      
                    </div>
                    <div class="number" id="remaining_time"><strong>0</strong></div>
                  </div>
                </div>
                <!-- Item -->
                
              </div>
            </div>
          </section>
          
        <section class="dashboard-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                  <div class="recent-activities card">
                    
                    <div class="card-header">
                      <h3 class="h4">Bid Info</h3>
                    </div>
                    <div class="card-body no-padding">
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="date"><span class="text-info" id="start_time" style="font-size: 30px;">00:00:00</span></div>
                            <div class="icon"><i class="icon-clock"></i></div>
                          </div>
                          <div class="col-8 content">
                            <h5>Start Time</h5>
                            
                          </div>
                        </div>
                      </div>
                      <div class="item">
                        <div class="row">
                          <div class="col-4 date-holder text-right">
                            <div class="date"><span class="text-info" id="end_time" style="font-size: 30px;">00:00:00</span></div>
                            <div class="icon"><i class="icon-clock"></i></div>
                          </div>
                          <div class="col-8 content">
                            <h5>End Time</h5>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="chart col-lg-6 col-12">
                 <div class="bar-chart has-shadow bg-white">
                    <div class="title"><strong class="text-violet">Manual Bidding</strong></div><div id="status_msg" style="color: green;"></div>
                   <div class="input-group">
                                <input type="hidden" value="" id="lot_id">
                                <input type="text" class="form-control" readonly="readonly" value="0" id="manual_bid"><span class="input-group-btn">
                                  <button type="button" class="btn btn-primary bidbtn" onclick="sendBid(document.getElementById('manual_bid').value)">Bid Now!</button></span>
                   </div>
                            
                             
                            
                    
                  </div>
                </div>


               

              </div>
             </div>
           </section>
          



          
                    


                  </div>
                </div>
              
              </div>
            </div>
          </section>
