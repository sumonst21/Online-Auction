
<div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Get Lots Report</h2>
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
                        
                        <?php $i=1; foreach ($buyer_list as $list) { ?>
                        <tr>
                        <?php echo form_open_multipart($add_buyer_data); ?>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $list['buyer_company_name']; ?></td>
                          <td>
                          <input type="hidden" name="auction_id" value="<?php echo $auction_id;?>">
                        <?php $buyers = $this->Common_model->getAll("tb_buyer_invite",array('buyer_invite_auction_id'=>$auction_id))->row_array(); $arr = explode(',',$buyers['buyer_invite_buyer_id']);  ?>
                          <input type="checkbox" <?php if(in_array($list['buyer_id'],$arr)){ echo 'checked="checked"'; } ?> name="buyer[]" value="<?php echo $list['buyer_id']; ?>" >
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
