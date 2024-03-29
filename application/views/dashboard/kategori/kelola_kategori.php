<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3>Kelola Kategori Bahan</h3>

        <?php
        if($this->session->flashdata("status") != null){
          echo $this->session->flashdata("status");
        }
        ?>
        <br/>
        <div style="margin-bottom: 10px;">
          <a href="<?= base_url()."kategori/tambah"?>" class="btn btn-success float-right">Tambah Kategori Bahan <i class="fa fa-plus"></i></a>

        </div>  
        <div>
          <table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl">
            <thead>
              <tr>
                <th width="20">No.</th>
                <th>Nama Kategori Bahan</th>
                <th>Jenis</th>
                <th width="20"></th>
              </tr>
            </thead>
            <tbody>

              <?php 
              if (isset($list)) {
              $i = 1;
              foreach ($list as $list): ?>
                <tr>
                  <td><?= $i ?>.</td>
                  <td><?= $list['NAMA_KATEGORI']?></td>
                  <td><?= $list['JENIS']?></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-sm btn-primary dropdown-toggle no-arrow" data-toggle="dropdown">
                        <span class="fa fa-ellipsis-v"></span>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url() ?>kategori/edit/<?= $list['ID_KATEGORI'] ?>">Ubah <i class="fa fa-edit"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $list['ID_KATEGORI']?>">Hapus <i class="fa fa-trash-o"></i></a>
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

  <div class="modal  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>kategori/hapus">

          <div class="modal-body">
            <span>Apakah anda yakin untuk menghapus data ini?</span>
            <input type="hidden" class="form-control" id="id_hapus" name="id_hapus">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>

      </div>
    </div>
  </div>