
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Add Lot</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/manage_auctions'); ?>">Manage Auctions</a></li>
              <li class="breadcrumb-item active">Add Lot For ...</li>
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
                      <h4 class="h4">Lots</h4>
                       <button style="margin-left: 65%;" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Lot</button>
                    </div>

                      
                    <div class="card-body">
                    
                      <table class="table table-striped table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>Lot Number</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Product Description</th>
                            <th>Quantity</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach ($lot_list as $lot) { ?>
                            <tr>
                              <td><?php echo $i ; ?></td>
                              <td><?php echo $lot['lot_number'] ; ?></td>
                              <td><?php echo $lot['auction_start_dt'] ; ?></td>
                              <td><?php echo $lot['auction_start_time'] ; ?></td>
                              <td><?php echo $lot['auction_end_time'] ; ?></td>
                              <td><?php echo $lot['lot_description'] ; ?></td>
                              <td><?php echo $lot['lot_product_qty'] ; ?></td>
                              <td><?php echo form_open_multipart($editLot); ?>
								<input type="hidden" name="lot_id" value="<?php echo $lot['id_lot']; ?>">
								<input type="submit" class="btn-primary" name="btn" value="Edit"></td>
								</form>
                              </td>
                              <td><input type="submit" class="btn-danger" value="Delete"></td>
                            </tr>
                         <?php $i=$i+1; } ?>
                        </tbody>

                      </table>
                      
                    </div>
                  </div>
                </div>

                <!---- lot model --->
                <!-- Modal Form-->
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-close">
                      
                   
                    
                      <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Add Buyer Here</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                  <label class="col-sm-12 form-control-label">Please Fill Details</label>
                                  
                                    <div class="col-sm-12">

                                    <?php echo form_open_multipart($add_lot_data); ?>
                                    <input type="hidden" name="auction_id" value="<?php echo $auction_id; ?>">
                                    <div class="form-group-material">
                                      <input id="lot_number" type="text" name="lot_number" required="required" class="input-material" autocomplete="off" placeholder="Lot Number" >
                                      </div>


                                    <div class="form-group-material">
                                      <textarea class="input-material" cols="50" name="lot_description" placeholder="Lot Description"></textarea>
                                    </div>

                                    
                                    <div class="form-group-material">
                                      <input id="lot_product_qty" type="text" name="lot_product_qty"  class="input-material" autocomplete="off" placeholder="Quantity">
                                    </div>

                                    <div class="form-group-material">
                                      <input id="lot_bid_unit" type="text" name="lot_bid_unit"  class="input-material" autocomplete="disable" placeholder="Bidding Unit">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="lot_emd_cmd" type="text" name="lot_emd_cmd"  class="input-material" autocomplete="disable" placeholder="Emd Cmd">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="lot_start_bid" type="text" name="lot_start_bid"  class="input-material" autocomplete="off" placeholder="Start Bid">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="lot_increment_by" type="text" name="lot_increment_by"  class="input-material" autocomplete="disable" placeholder="Increment By">
                                    </div>
                                    
                                   
                                    <table>
                                      <tr>
                                        <td>Image 1</td>
                                        <td><input id="lot_img_1" type="file" name="lot_img_1"  class="input-material"></td>
                                      </tr>
                                      <tr>
                                        <td>Image 2</td>
                                        <td><input id="lot_img_2" type="file" name="lot_img_2"  class="input-material"></td>
                                      </tr>
                                      <tr>
                                        <td>Image 3</td>
                                        <td><input id="lot_img_3" type="file" name="lot_img_3"  class="input-material"></td>
                                      </tr>
                                      <tr>
                                        <td>Catalogue 1</td>
                                        <td><input id="lot_catalogue_1" type="file" name="lot_catalogue_1"  class="input-material"></td>
                                      </tr>
                                      <tr>
                                        <td>Catalogue 2</td>
                                        <td><input id="lot_catalogue_2" type="file" name="lot_catalogue_2"  class="input-material"></td>
                                      </tr>
                                      <tr>
                                        <td>Catalogue 3</td>
                                        <td><input id="lot_catalogue_3" type="file" name="lot_catalogue_3"  class="input-material"></td>
                                      </tr>
                                    </table>

                                  </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                              
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!---///lot model---->


              
              </div>
            </div>
          </section>