 <div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3>Kelola Cabang</h3>

        <?php
        if($this->session->flashdata("status") != null){
          echo $this->session->flashdata("status");
        }
        ?>
        <br/>
        <div style="margin-bottom: 10px;">
          <a href="<?= base_url()."cabang/tambah"?>" class="btn btn-success float-right">Tambah Cabang <i class="fa fa-plus"></i></a>

        </div>
        <div>
          <table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl">
            <thead>
              <tr>
                <th width="20">No.</th>
                <th>Nama Cabang</th>
                <th>Pemilik</th>
                <th>Alamat</th>
                <th>Jam Operasional</th>
                <th width="10">Pengeluaran<small> (Lain-Lain)</small></th>
                <th width="10">Bahan Baku</th>
                <th width="10">Menu Cabang</th>
                <th width="5">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              if (isset($list)) {
                $i = 1;
                foreach ($list as $list): ?>
                  <tr>
                    <td><?= $i ?>.</td>
                    <td><?= $list['NAMA_CABANG']?></td>
                    <td><?= $list['NAMA_PEMILIK']?></td>
                    <td><?= $list['ALAMAT']?></td>
                    <td><?= $list['JAM_BUKA'].'-'.$list['JAM_TUTUP']?></td>
                    <td><a href="<?= base_url() ?>cabang/pengeluaranCabang/<?= $list['ID_CABANG'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-money"></i> Pengeluaran</a></td>
                    <td><a href="<?= base_url() ?>cabang/bahanCabang/<?= $list['ID_CABANG'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-cube"></i> Bahan Baku</a></td>
                    <td><a href="<?= base_url() ?>cabang/menuCabang/<?= $list['ID_CABANG'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-cutlery"></i> List Menu</a></td>
                    <td>
                      <div class="dropdown dropleft">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm no-arrow" data-toggle="dropdown">
                          <span class="fa fa-ellipsis-v"></span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?= base_url() ?>cabang/edit/<?= $list['ID_CABANG'] ?>">Ubah <i class="fa fa-edit"></i></a>
                          <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $list['ID_CABANG']?>" >Hapus <i class="fa fa-trash-o"></i></a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; endforeach;}
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
          <form method="post" action="<?= base_url() ?>cabang/hapus">

            <div class="modal-body">
              <span>Apakah anda yakin untuk menghapus data ini?</span>
              <input type="hidden" class="form-control" id="id_hapus" name="id_hapus">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
          </form>

        </div>
      </div>
    </div>