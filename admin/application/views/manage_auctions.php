
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Manage Auctions</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Manage Auctions</li>
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
                      <h4 class="h4">List Of Auctions</h4>
                       <a href="<?php echo base_url('index.php/add_auction'); ?>">
                       <button style="margin-left: 470%;" type="button" class="btn btn-primary">Add Auction</button>
                       </a>
                    </div>

                      
                    <div class="card-body">
                    
                      <table class="table table-striped table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                           
                            <th>Lots</th>
                            <th>Date and Time</th>
                            <th>Live</th>
                            <th>Add Buyers</th>
                            <th>Archive</th>
							<th>Delete</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($auctionList as $list) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['auction_number']; ?></td>
                          <td><?php echo $list['auction_description']; ?></td>
                          
                          <td>
                          <?php echo form_open_multipart($add_lot); ?>
                          <input type="hidden" name="auction_id" value="<?php echo $list['id_m_a']; ?>">
                          <input type="submit" value="<?php echo $this->Auctions_model->get_lot_count($list['id_m_a']);?>">
                          </form> 
                          </td>
                          <td><?php echo $list['auction_start_dt']." ".$list['auction_start_time']; ?></td>
                          <td>
                          <?php if ($list['live']==0) { ?>
                          <button id="<?php echo $list['id_m_a']; ?>" class="btn btn-primary live" >Live</button>
                          <?php } else { ?>
                          <button id="<?php echo $list['id_m_a']; ?>" class="btn btn-success live" >Hold</button>
                          <?php } ?>
                          </td>
                          <td>
                         
                          <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Manage_auctions/add_buyers/<?php echo $list['id_m_a']; ?>'">Add Buyers </button>
                       
                          </td>
                          <td><button id="<?php echo $list['id_m_a']; ?>" class="btn btn-secondary archive">Archive</button></td>
                          <td>
                            <?php echo form_open_multipart($delete); ?>
                            <input type="hidden" name="id_m_a" value="<?php echo $list['id_m_a']; ?>">
                              <input type="submit" class="btn-danger" name="btn" value="Delete">
                              </form>
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
