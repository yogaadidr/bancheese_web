<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3>Download APK</h3>

        <?php
        if($this->session->flashdata("status") != null){
          echo $this->session->flashdata("status");
        }
        ?>
        <br/>
        <div style="margin-bottom: 10px;">
          <a href="<?= base_url()."download/tambah"?>" class="btn btn-success float-right">Tambah APK <i class="fa fa-plus"></i></a>

        </div>  
        <div>
          <table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables">
            <thead>
              <tr>
                <th width="20">No.</th>
                <th>Versi</th>
                <th>Deskripsi</th>
                <th width="20"></th>
              </tr>
            </thead>
            <tbody>

              <?php 
              if (isset($list)) {
                $i = 1;
                foreach ($list as $list): ?>
                  <tr>
                    <td><?= $i?></td>
                    <td><?= $list['VERSION']?></td>
                    <td><?= $list['DESKRIPSI']?></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle no-arrow" data-toggle="dropdown">
                          <span class="fa fa-ellipsis-v"></span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?=$list['LINK']?>">Download <i class="fa fa-download"></i></a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; endforeach; 
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>