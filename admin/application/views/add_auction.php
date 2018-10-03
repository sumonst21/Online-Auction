
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Add Auction</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/manage_auctions'); ?>">Manage Auctions</a></li>
              <li class="breadcrumb-item active">Add Auctions</li>
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
                      <h4 class="h4">Add Auction details here</h4>
                       
                    </div>

                      
                    <div class="card-body">
                    

                       <div class="col-sm-12">

                                    <?php echo form_open_multipart($add_auction_data); ?>
                                     <div class="form-group-material">
                                        Select Seller
                                        <select class="input-material" name="seller_id" required="required">  
                                          <?php foreach ($get_seller_list as $list) { ?>
                                            <option value="<?php echo $list['company_id']; ?>"><?php echo $list['seller_company_name']; ?></option>
                                         <?php } ?> 
                                        </select>
                                      </div>


                                      <div class="form-group-material">
                                      Auction Type
                                      <select class="input-material" name="auction_type" required="required">  
                                        <option value="1">Forward</option>
                                        <option value="2">Reverse</option>
                                      </select>
                                    </div>
                                    

                                    <div class="form-group-material">
                                      <input id="auction_number" type="text" name="auction_number"  class="input-material" autocomplete="off" placeholder="Auction Number Here" required="required">
                                    </div>

                                    <div class="form-group-material">
                                    
                                      <textarea class="input-material" cols="50" name="auction_description" placeholder="Auction Description"></textarea>
                                    </div>

                                    <div class="form-group-material">
                                    
                                      <textarea class="input-material" cols="50" name="material_venue" placeholder="Material Venue"></textarea>
                                    </div>

                                    <table>
                                      <tr>
                                        <td>Select Start Date</td>
                                        <td><input id="auction_start_dt" type="date" name="auction_start_dt"  class="input-material" autocomplete="off"></td>
                                        <td></td>
                                        <td>Select Start Time (Hour:Minute AM/PM)</td>
                                        <td><input id="auction_start_time" type="time" name="auction_start_time"  class="input-material" autocomplete="off"></td>
                                      </tr>
                                      <tr>
                                        <td>Select End Date</td>
                                        <td><input id="auction_end_dt" type="date" name="auction_end_dt"  class="input-material" autocomplete="off"></td>
                                        <td></td>
                                        <td>Select End Time  (Hour:Minute AM/PM)</td>
                                        <td><input id="auction_end_time" type="time" name="auction_end_time"  class="input-material" autocomplete="off"></td>
                                      </tr>
                                    </table>
                                    <br>
                                    <div class="form-group-material">
                                    Upload Auction Term
                                     <input type="file" name="term" class="input-material">
                                    </div>
                                    <div class="form-group-material">
                                    Upload Auction Catelogue
                                     <input type="file" name="catelogue" class="input-material">
                                    </div>
                                    
                                    <input type="submit" value="Submit">
                                    </form>
                                  </div>
                      
                      
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>