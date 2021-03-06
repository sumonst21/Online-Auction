
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
              <li class="breadcrumb-item active">Manage Companies</li>
            </div>
          </ul>



          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                
                <!-- Modal Form-->
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-close">
                      
                   
                    
                      <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Add Company Here</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                  <label class="col-sm-12 form-control-label">Please Fill Details</label>
                                  
                                    <div class="col-sm-12">

                                    <?php echo form_open_multipart($add_data); ?>
                                    <div class="form-group-material">
                                      <input id="seller_company_name" type="text" name="seller_company_name" required="required" class="input-material" autocomplete="disable" placeholder="Company Name" >
                                      </div>


                                      <div class="form-group-material">
                                      Seller Type
                                      <select class="input-material" name="seller_type" required="required">  
                                        <option value="1">Forward</option>
                                        <option value="2">Reverse</option>
                                      </select>
                                    </div>

                                    <!--- username and password -->
                                    <div class="form-group-material">
                                      <input id="username" type="text" name="username"  class="input-material" autocomplete="off" placeholder="Username" required="required">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="enc_password" type="text" name="enc_password"  class="input-material" autocomplete="off" placeholder="Password" required="required">
                                    </div>
                                  ` <!--- username and password -->

                                    <div class="form-group-material">
                                    Address
                                      <textarea class="input-material" cols="50" name="seller_address"></textarea>
                                    </div>

                                    
                                    <div class="form-group-material">
                                      <input id="seller_city" type="text" name="seller_city"  class="input-material" autocomplete="disable" placeholder="City">
                                   
                                      
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_state" type="text" name="seller_state"  class="input-material" autocomplete="disable" placeholder="State">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_zip" type="text" name="seller_zip"  class="input-material" autocomplete="disable" placeholder="Zip Code">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_country" type="text" name="seller_country"  class="input-material" autocomplete="off" placeholder="Country">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_phone-1" type="text" name="seller_phone_1"  class="input-material" autocomplete="disable" placeholder="Phone 1">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_phone-2" type="text" name="seller_phone_2"  class="input-material" autocomplete="disable" placeholder="Phone 2">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_fax" type="text" name="seller_fax"  class="input-material" autocomplete="disable" placeholder="FAX Number">
                                    </div>
                                    <div class="form-group-material">
                                    Upload Image
                                     <input type="file" name="seller_image" class="input-material">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_alt_email" type="text" name="seller_alt_email"  class="input-material" autocomplete="disable" placeholder="Seller Alternate Email">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_contact_1" type="text" name="seller_contact_1"  class="input-material" autocomplete="disable" placeholder="Contact 1">
                                    </div>
                                    <div class="form-group-material">
                                      <input id="seller_contact_2" type="text" name="seller_contact_2"  class="input-material" autocomplete="disable" placeholder="Contact 2">
                                    </div>
                                    <div class="form-group-material">
                                  
                                      <input id="seller_contact_3" type="text" name="seller_contact_3"  class="input-material" autocomplete="disable" placeholder="Contact 3">
                                   </div>

                                    <div class="form-group-material">
                                    Description
                                      <textarea class="input-material" cols="50" name="seller_description"></textarea>
                                    </div>
                                    
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
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                     
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">List Of Companies</h4>
                       <button style="margin-left: 65%;" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Company</button>
                    </div>
                    <div class="card-body">
                    
                      <table class="table table-striped table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Type</th>
                            <th>Details</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                      $i=1;
                     foreach ($companyList as $comp) {
                      
                   ?>
                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $comp['seller_company_name']; ?></td>
                            <td><?php if ($comp['seller_type'] == '1') {echo "Forward";}else {echo "Reverse";} ?></td>
                            <td>
                            <?php echo form_open_multipart($edit); ?>
                            <input type="hidden" name="company_id" value="<?php echo $comp['company_id']; ?>">
                            <input type="submit" class="btn-primary" name="btn" value="Details"></td>
                            </form>
                            <td>
                            <?php echo form_open_multipart($delete); ?>
                            <input type="hidden" name="company_id" value="<?php echo $comp['company_id']; ?>">
                              <input type="submit" class="btn-danger" name="btn" value="Delete">
                              </form>
                            </td>
                          </tr>
                          <?php
                        $i=$i+1;
                        } ?>
                        </tbody>

                      </table>
                      
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>