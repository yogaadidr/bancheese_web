 <div class="main-content">
        <div class="row" style="position: relative;">


          <div class="col-md-12">
            <div class="card card-body">
            <h3>Kelola User</h3>

                  <?php
                    if($this->session->flashdata("status") != null){
                      echo $this->session->flashdata("status");
                    }
                  ?>
                  <br/>
              <div>
                <a href="<?= base_url()."user/tambah"?>" class="btn btn-success btn-round float-right">Tambah User <i class="fa fa-plus"></i></a>
                
              </div> 
              <div class="flexbox">
              <div class="table">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="20">No.</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th width="20"></th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                $i = 1;
                foreach ($list as $list): ?>
                  <tr>
                    <td>1.</td>
                    <td><?= $list['NAMA_USER']?></td>
                    <td><?= $list['ALAMAT']?></td>
                    <td><?= $list['NO_HP']?></td>
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





        </div>
      </div><!--/.main-content -->