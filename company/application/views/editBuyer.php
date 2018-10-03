
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Manage Companies</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/buyers'); ?>">Manage Buyers</a></li>
              <li class="breadcrumb-item active">Buyer Details</li>
            </div>
          </ul>



          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                
                <!-- Modal Form-->
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-close">
                     
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                     
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">Edit Buyer Data</h4>
                       
                    </div>
                    <div class="card-body">
                    
                      <div class="row">
                                
                                    <div class="col-sm-12">

                                    <?php echo form_open_multipart($edit_data); ?>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Name of Company</label>
                                      <input id="buyer_company_name" type="text" name="buyer_company_name" required="required" class="input-material" autocomplete="disable" placeholder="Company Name"
                                      value="<?php foreach ($buyerEdit as $buyer)
                                      {
echo $buyer['buyer_company_name'];
                                        }?>">
                                      
										
									<div class="form-group-material">
                                    <label class="form-control-label">Username</label>
                                      <input id="username" type="text" name="username"  class="input-material" autocomplete="off" placeholder="Username" value="<?php echo $buyerEdit[0]['username']; ?>">
									</div>	
									<div class="form-group-material">
									<label class="form-control-label">Password</label>
                                      <input id="password" type="text" name="password"  class="input-material" autocomplete="off" placeholder="Password" value="<?php echo $buyerEdit[0]['password']; ?>">
									</div>
									
                                      <div class="form-group-material">
                                      Buyer Type
                                      <select class="input-material" name="buyer_type" required="required">  
                                     
                                      

                                      
                                      
                                      <option value="1" <?php if($buyerEdit[0]['buyer_type']=='1'){ ?> selected="selected" <?php } ?>>Forward</option>
                                      <option value="2" <?php if($buyerEdit[0]['buyer_type']=='2'){ ?> selected="selected" 
                                      <?php } ?>>Reverse</option>
                                      <option value="3" <?php if($buyerEdit[0]['buyer_type']=='3'){ ?> selected="selected" <?php } ?>>Both</option>
                                      </select>
                                    </div>


                                    <div class="form-group-material">
                                    Address
                                      <textarea class="input-material" cols="50" name="buyer_address"><?php echo $buyerEdit[0]['buyer_type']; ?></textarea>
                                    </div>

                                    
                                    <div class="form-group-material">
                                    <label class="form-control-label">City</label>
                                      <input id="buyer_city" type="text" name="buyer_city"  class="input-material" autocomplete="off" placeholder="City" value="<?php echo $buyerEdit[0]['buyer_city']; ?>">
                                   
                                      
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">State</label>
                                      <input id="buyer_state" type="text" name="buyer_state"  class="input-material" autocomplete="off" placeholder="State" value="<?php echo $buyerEdit[0]['buyer_state']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Zip Code</label>
                                      <input id="buyer_zip" type="text" name="buyer_zip"  class="input-material" autocomplete="disable" placeholder="Zip Code" value="<?php echo $buyerEdit[0]['buyer_zip']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Country</label>
                                      <input id="buyer_country" type="text" name="buyer_country"  class="input-material" autocomplete="off" placeholder="Country" value="<?php echo $buyerEdit[0]['buyer_country']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Phone 1</label>
                                      <input id="buyer_phone_1" type="text" name="buyer_phone_1"  class="input-material" autocomplete="disable" placeholder="Phone 1" value="<?php echo $buyerEdit[0]['buyer_phone_1']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Phone 2</label>
                                      <input id="buyer_phone_2" type="text" name="buyer_phone_2"  class="input-material" autocomplete="disable" placeholder="Phone 2" value="<?php echo $buyerEdit[0]['buyer_phone_2']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Fax Number</label>
                                      <input id="buyer_fax" type="text" name="buyer_fax"  class="input-material" autocomplete="disable" placeholder="FAX Number" value="<?php echo $buyerEdit[0]['buyer_fax']; ?>">
                                    </div>
                                    
                                    <div class="form-group-material">
                                    <label class="form-control-label">Alternate Email</label>
                                      <input id="buyer_alt_email" type="text" name="buyer_alt_email"  class="input-material" autocomplete="disable" placeholder="Buyer Alternate Email" value="<?php echo $buyerEdit[0]['buyer_alt_email']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Contact Person 1</label>
                                      <input id="buyer_contact_1" type="text" name="buyer_contact_1"  class="input-material" autocomplete="off" placeholder="Contact 1" value="<?php echo $buyerEdit[0]['buyer_contact_1']; ?>">
                                    </div>
                                    <div class="form-group-material">
                                    <label class="form-control-label">Contact Person 2</label>
                                      <input id="buyer_contact_2" type="text" name="buyer_contact_2"  class="input-material" autocomplete="disable" placeholder="Contact 2" value="<?php echo $buyerEdit[0]['buyer_contact_2']; ?>">
                                    </div>
                                    
                                  </div>
                                </div>
                              <input type="hidden" name="buyer_id" value="<?php echo $buyerEdit[0]['buyer_id']; ?>">
                              <button type="submit" class="btn btn-primary">Save</button>
                              
                            </form>

                            <!---   form end here-->
                      
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>