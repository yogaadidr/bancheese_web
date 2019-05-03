<?php
$nama_menu = "";
$harga = "";
$status = "0";
$checkbox = ($status != '0')?'checked':'';
?>
<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> Cabang</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <label for="email">Nama menu</label> <input type="text" class="form-control" name="NAMA_MENU" value="<?= $nama_menu ?>" placeholder="Nama Menu" id="NAMA_MENU">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="pwd">Harga</label>
                <input type="text" class="form-control" name="HARGA" value="<?= $harga ?>" placeholder="Harga" id="HARGA">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="pwd">Status</label>
                <div class="checkbox">
                  <input type="checkbox" name="STATUS" id="STATUS" value="$status" <?=$checkbox?>> Active
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url()."menu/" ?>" class="btn btn-warning">Kembali</a>
        </form>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

</script>