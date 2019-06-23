<?php
$nama_kategori = "";
$id_kategori = "";

if($list != null){
  $nama_kategori = $list['NAMA_KATEGORI'];
  $id_kategori = $list['ID_KATEGORI'];
}
?>
<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> Kategori Bahan</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_KATEGORI" value="<?= $id_kategori ?>" id="ID_KATEGORI" hidden>

                <label for="bahan_baku">Nama kategori bahan</label>
                <input type="text" class="form-control" name="NAMA_KATEGORI" value="<?= $nama_kategori?>" placeholder="Nama Kategori Bahan" id="NAMA_KATEGORI">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url()."kategori/" ?>" class="btn btn-warning">Kembali</a>
        </form>

      </div>
    </div>
  </div>
</div>