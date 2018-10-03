
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Approve Bidder</h2>
            </div>
          </header>
<!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>

              <li class="breadcrumb-item active">Get Lot Report</li>
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
                            <th>Buyer Company Name</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        <?php $i=1; 
                        foreach ($data2 as $dta2) {
			$details=$this->Common_model->getAllAppr("tb_buyers",array('buyer_id' => $dta2))->result_array(); ?>
                        <tr>
                        <?php echo form_open_multipart($add_approval); ?>
                          <td><?php echo $i; ?></td>
                          <td><?php if (isset($details[0]['buyer_company_name'])) {
                          	echo $details[0]['buyer_company_name'];
                          } ?></td>
                          <td>
                          <input type="hidden" name="id_lot" value="<?php echo $id_lot;?>">
                         
                         
                         <?php $dataList = $this->Common_model->getAll("tb_approved",array('approved_lot_id'=>$id_lot))->row_array();
                            $arr=explode(',',$dataList['approved_buyer_id']);
                        
                              ?>
                          <input type="checkbox" <?php if(in_array($details[0]['buyer_id'],$arr)) echo 'checked="checked"'; ?> name="buyer[]" value="<?php if(isset($details[0]['buyer_id'])) {echo $details[0]['buyer_id']; } ?>" >
                         
                          </td>
                          
                        </tr>
                        <?php $i=$i+1; } ?>
                        </tbody>
                        <input type="submit" name="submit" value="submit">
                        </form>
                      </table>
                    </div>
                  </div>
                </div>

           
              </div>
            </div>
          </section>
