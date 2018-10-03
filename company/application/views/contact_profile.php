
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Contatct and Profile Management</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/contact_profile'); ?>">Manage Contact/Profile</a></li>
              
            </div>
          </ul>



          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">Manage Contact Details Here</h4>
					</div>
					
					<div class="card-body">
						<div class="col-sm-12">
                            <?php echo form_open_multipart($contact);?>
                                     <table style="width:100%;">
										<tr>
											<td>Organisation Name<td>
											<td><input type="text" name="org_name" id="org_name" value="<?php echo $dataContact['org_name']; ?>"><td>
										
											<td>Organisation Address<td>
											<td><input type="text" name="org_address" id="org_address" value="<?php echo $dataContact['org_address']; ?>"><td>
										</tr>
										<tr>
											<td>City<td>
											<td><input type="text" name="city" id="city" value="<?php echo $dataContact['city']; ?>"><td>
										
											<td>State<td>
											<td><input type="text" name="state" id="state" value="<?php echo $dataContact['state']; ?>"><td>
										</tr>
										<tr>
											<td>Country<td>
											<td><input type="text" name="country" id="country" value="<?php echo $dataContact['country']; ?>"><td>
										
											<td>Phone 1<td>
											<td><input type="text" name="phone1" id="phone1" value="<?php echo $dataContact['phone1']; ?>"><td>
										</tr>
										<tr>
											<td>Phone2<td>
											<td><input type="text" name="phone2" id="phone2" value="<?php echo $dataContact['phone2']; ?>"><td>
										
											<td>Zip Code<td>
											<td><input type="text" name="zip" id="zip" value="<?php echo $dataContact['zip']; ?>"><td>
										</tr>
										<tr>
											<td>Email 1<td>
											<td>Used for: <input type="text" name="use_email_1" id="use_email_1" value="<?php echo $dataContact['use_email_1']; ?>"><br>Email:<input type="text" name="email1" id="email1" value="<?php echo $dataContact['email1']; ?>"><td>
										
											<td>Email 2<td>
											<td>Used for: <input type="text" name="use_email_2" id="use_email_2" value="<?php echo $dataContact['use_email_2']; ?>"><br>Email:<input type="text" name="email2" id="email2" value="<?php echo $dataContact['email2']; ?>"><td>
										</tr>
										<tr>
											<td>Email 3<td>
											<td>Used for: <input type="text" name="use_email_3" id="use_email_3" value="<?php echo $dataContact['use_email_3']; ?>"><br>Email:<input type="text" name="email3" id="email3" value="<?php echo $dataContact['email3']; ?>"><td>
										
											<td>Email 4<td>
											<td>Used for: <input type="text" name="use_email_4" id="use_email_4" value="<?php echo $dataContact['use_email_4']; ?>"><br>Email:<input type="text" name="email4" id="email4" value="<?php echo $dataContact['email4']; ?>"><td>
										</tr>
										<tr>
											<td>Contact Person 1<td>
											<td><input type="text" name="contact1" id="contact1" value="<?php echo $dataContact['contact1']; ?>"><td>
										
											<td>Contact Person 2<td>
											<td><input type="text" name="contact2" id="contact2" value="<?php echo $dataContact['contact2']; ?>"><td>
										</tr>
										<tr>
											<td>Business Details<td>
											<td><textarea name="business_detail" id="business_detail"><?php echo $dataContact['business_detail']; ?></textarea><td>
										</tr>
										<tr>
											<td><button type="submit" class="btn btn-success">Save</button><td>
										</tr>
										
									 </table>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
				<div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h4 class="h4">Manage Company Profile Here</h4>
					</div>
					
					<div class="card-body">
						<div class="col-sm-12">
                            <?php echo form_open_multipart($profile); ?>
                                    <table class="table">
										<tr>
											<td>Company Profile<td>
											<td><textarea name="comp_profile" id="comp_profile" rows="4" cols="50"><?php echo $dataContact['comp_profile']; ?></textarea><td>
										</tr>
										<tr>
											<td><button type="submit" class="btn btn-success">Save</button><td>
										</tr>
									</table>									
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>