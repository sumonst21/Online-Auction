
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Images on User's Section</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          
          <section class="tables" style="margin-top: -3.5%; margin-left: -2%;">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
					
					<table class="tables" width="100%">
						<?php $attributes = array('class' => 'form','role' => 'form'); echo form_open_multipart($uploadImage1,$attributes); ?>
						<tr>
						<td>Image 1</td>
						<td><input type="file" name="image1"></td>
						<td><input type="submit" class="btn btn-success" value="Upload"></td>
						</tr>
						</form>
						<?php $attributes = array('class' => 'form','role' => 'form'); echo form_open_multipart($uploadImage2,$attributes); ?>
						<tr>
						<td>Image 2</td>
						<td><input type="file" name="image2"></td>
						<td><input type="submit" class="btn btn-success" value="Upload"></td>
						</tr>
						</form>
						<?php $attributes = array('class' => 'form','role' => 'form'); echo form_open_multipart($uploadImage3,$attributes); ?>
						<tr>
						<td>Image 3</td>
						<td><input type="file" name="image3"></td>
						<td><input type="submit" class="btn btn-success" value="Upload"></td>
						</tr>
						</form>
					</table>
					
					</form>
                    </div>
				  </div>
                </div>
              
              </div>
            </div>
          </section>