<?php
$id_menu ="";
$nama_menu = "";
$harga = "";
$status = "0";

if($list != null){
  $id_menu = $list['ID_MENU'];
  $nama_menu = $list['NAMA_MENU'];
  $harga = $list['HARGA'];
  $status = $list['STATUS'];
}

$checkbox = ($status != '0')?'checked':'';
?>
<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> Menu</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_MENU" value="<?= $id_menu ?>" id="ID_MENU" hidden>

                <label for="menu">Nama menu</label>
                <input type="text" class="form-control" name="NAMA_MENU" value="<?= $nama_menu?>" placeholder="Nama Menu" id="NAMA_MENU">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="HARGA" value="<?= $harga ?>" placeholder="Harga" id="HARGA">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="status">Status</label>
                <div class="checkbox">
                  <input type="checkbox" name="STATUS" id="STATUS" value="<?=$status?>" <?=$checkbox?>> 
                  <label id="LBL_STATUS"><?=($status!='0')?'Active':'Non Active'?></label>
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
$(document).ready(function(){
  $("#STATUS").change(function(){
    if(this.checked) {
      $(this).val("1");
      $("#LBL_STATUS").text("Active");
    }else{
      $(this).val("0");
      $("#LBL_STATUS").text("Non Active");
    }
  });
});
</script>