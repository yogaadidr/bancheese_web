 <div class="main-content">
        <div class="row" style="position: relative;">


          <div class="col-md-12">
            <div class="card card-body">
             <h3>Kelola Menu</h3>

                  <?php
                    if($this->session->flashdata("status") != null){
                      echo $this->session->flashdata("status");
                    }
                  ?>
                  <br/>
              <div>
                <a href="<?= base_url()."menu/tambah"?>" class="btn btn-success btn-round float-right">Tambah Menu <i class="fa fa-plus"></i></a>
                
              </div>  
              <div class="flexbox">

              <table class="table table-stripped">
              	<thead>
              		<tr>
              			<th width="20">No.</th>
              			<th>Nama Menu</th>
              			<th>Harga Satuan</th>
              			<th width="20"></th>
              		</tr>
              	</thead>
              	<tbody>

              	<?php 
              	$i = 1;
              	foreach ($list as $list): ?>
              		<tr>
              			<td><?= $i ?>.</td>
              			<td><?= $list['NAMA_MENU']?></td>
              			<td>Rp. <?= number_format($list['HARGA'])?></td>
              			<td>
              				<div class="dropdown">
							  <button type="button" class="btn btn-primary dropdown-toggle btn-round no-arrow" data-toggle="dropdown">
							    <span class="fa fa-ellipsis-v"></span>
							  </button>
							  <div class="dropdown-menu">
							    <a class="dropdown-item" href="#">Ubah <i class="fa fa-edit"></i></a>
							    <a class="dropdown-item" href="#">Hapus <i class="fa fa-trash-o"></i></a>
							  </div>
							</div>
              			</td>
              		</tr>
              	<?php $i++; endforeach;
              	?>

              		
              	</tbody>
              </table>


              </div>
            </div>
          </div>





        </div>
      </div><!--/.main-content -->