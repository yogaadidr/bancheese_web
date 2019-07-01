<?php
$id_bahan ="";
$nama_bahan = "";
$satuan = "";
$id_kategori = "";

if($list != null){
  $id_bahan = $list['ID_BAHAN'];
  $nama_bahan = $list['NAMA_BAHAN'];
  $satuan = $list['SATUAN'];
  $id_kategori = $list['ID_KATEGORI'];
}
?>
<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> Bahan Baku</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_BAHAN" value="<?= $id_bahan ?>" id="ID_BAHAN" hidden>

                <label for="bahan_baku">Nama bahan baku</label>
                <input type="text" class="form-control" name="NAMA_BAHAN" value="<?= $nama_bahan?>" placeholder="Nama Bahan Baku" id="NAMA_BAHAN">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan">Satuan <small>Pcs,Kg,Pack Dll</small></label>
                <input type="text" class="form-control" name="SATUAN" value="<?= $satuan ?>" placeholder="Satuan" id="SATUAN">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="status">Kategori</label>
                <select class="form-control" name="KATEGORI" id="KATEGORI">
                  <option value="0" selected disabled="">Select Kategori</option>
                  <?php
                  foreach ($kategori as $kg) {?>
                    <option value="<?= $kg['ID_KATEGORI'] ?>"
                      <?= ($kg['ID_KATEGORI']==$id_kategori)?'selected':''?>><?=$kg['NAMA_KATEGORI']?></option>
                    <?php }
                    ?>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url()."bahan/" ?>" class="btn btn-warning">Kembali</a>
        </form>

      </div>
    </div>
  </div>
</div>