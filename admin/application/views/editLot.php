
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Manage Lots</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Manage_auctions'); ?>">Manage Auctions</a></li>
              <li class="breadcrumb-item active">Lot Details</li>
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
                      <h4 class="h4">Edit Lot Data</h4>
                       
                    </div>
                    <div class="card-body">
                    
                      <div class="row">
                                
                                    <div class="col-sm-12">

                                    <?php echo form_open_multipart($edit_Lot_data); ?>
                                    <table>
										<tr>
											<td>Lot Number</td>
											
											<td><input type="text" name="lot_number" value="<?php echo $editLotData['lot_number']; ?>" /></td>
										</tr>
										<tr>
											<td>Lot Description</td>
											<td><textarea name="lot_description"><?php echo $editLotData['lot_description']; ?></textarea></td>
										</tr>
										<tr>
											<td>Lot Product Quantity</td>
											<td><input type="text" name="lot_product_qty" value="<?php echo $editLotData['lot_product_qty']; ?>" /></td>
										</tr>
										<tr>
											<td>Lot Bid Unit</td>
											<td><input type="text" name="lot_bid_unit" value="<?php echo $editLotData['lot_bid_unit']; ?>" /></td>
										</tr>
										<tr>
											<td>Lot EMD CMD</td>
											<td><input type="text" name="lot_emd_cmd" value="<?php echo $editLotData['lot_emd_cmd']; ?>" /></td>
										</tr>
										<tr>
											<td>Lot Start Bid</td>
											<td><input type="text" name="lot_start_bid" value="<?php echo $editLotData['lot_start_bid']; ?>" /></td>
										</tr>
										<tr>
											<td>Lot Increment By</td>
											<td><input type="text" name="lot_increment_by" value="<?php echo $editLotData['lot_increment_by']; ?>" /></td>
										</tr>
										
									</table>
                                </div>
                              <input type="hidden" name="id_lot" value="<?php echo $editLotData['id_lot']; ?>">
                              <button type="submit" class="btn btn-primary">Save</button>
                              
                            </form>

                            <!---   form end here-->
                      
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>