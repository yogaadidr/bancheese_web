<?php
$id_menu ="";
$nama_menu = "";
$harga = "";
$id_menu_detail="";
$harga_master="";
$status = "0";
$hidden = 'hidden';

if($list != null){
  $hidden = '';
  $id_menu = $list['ID_MENU'];
  $id_menu_detail = $list['ID_MENU_DETAIL'];
  $nama_menu = $list['NAMA_MENU'];
  $harga_master = $list['HARGA_MASTER'];
  $harga = $list['HARGA'];
  $status = $list['STATUS'];
}

$checkbox = ($status != '0')?'checked':'';
?>
<div class="main-content">
  <div class="row" style="position: relative;">
    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> Menu Cabang <?=$cabang['NAMA_CABANG']?></h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_MENU_DETAIL" value="<?= $id_menu_detail ?>" id="ID_MENU_DETAIL" hidden>

                <label for="menu">Menu Master</label>
                <select class="form-control" name="MASTER_MENU" id="MASTER_MENU">
                  <option selected disabled value="0">Select Menu</option>
                  <?php foreach ($master_menu as $list_m) :
                    if ($list_m['STATUS']=='1') {?>
                    <option <?=$list_m['ID_MENU']==$id_menu?'selected':''?> value="<?=$list_m['ID_MENU'].'#'.$list_m['NAMA_MENU']?>"><?=$list_m['NAMA_MENU']?></option>
                  <?php }endforeach?>
                </select>
                <small><a href="#" id="GANTI_MENU" <?=$hidden?>><?=$hidden==''?'Batal':'Ganti Nama Menu'?></a></small>
              </div>
            </div>

            <div class="col-md-12" <?=$hidden?> id="DIV_MENU_BARU">
              <div class="form-group">
                <label for="menu">Nama Menu Baru</label>
                <input type="text" class="form-control" name="NAMA_MENU" id="NAMA_MENU" value="<?= $nama_menu?>" placeholder="Nama Menu Baru">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="HARGA_MASTER" value="<?= $harga_master ?>" placeholder="Harga" id="HARGA_MASTER" readonly>
                <small><a href="#" id="GANTI_HARGA" <?=$hidden?>><?=$hidden==''?'Batal':'Ganti Harga Menu'?></a></small>
              </div>
            </div>
            <div class="col-md-12" <?=$hidden?> id="DIV_HARGA_BARU">
              <div class="form-group">
                <label for="harga">Harga Baru</label>
                <input type="text" class="form-control" name="HARGA" value="<?= $harga ?>" placeholder="Harga Baru" id="HARGA">
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
          <a href="<?= base_url()."cabang/menuCabang/$id_cabang" ?>" class="btn btn-warning">Kembali</a>
        </form>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $("#MASTER_MENU").change(function(){
      $("#GANTI_MENU").removeAttr("hidden");
      $("#GANTI_HARGA").removeAttr("hidden");
    });

    $("#STATUS").change(function(){
      if(this.checked) {
        $(this).val("1");
        $("#LBL_STATUS").text("Active");
      }else{
        $(this).val("0");
        $("#LBL_STATUS").text("Non Active");
      }
    });

    $("#MASTER_MENU").change(function(){
      var val = $("#MASTER_MENU").val();
      $.ajax({
        type    : 'POST', 
        url     : "<?= base_url('cabang/getDetailMenu/')?>" + val,
        cache   : false,
        success : function(data){ 
          $('#HARGA_MASTER').val(data);
        }
      });
    });

    $("#GANTI_MENU").click(function(){
      var sts_menu = $("#GANTI_MENU").text();
      
      if (sts_menu == 'Batal') {
        $("#DIV_MENU_BARU").attr("hidden","true");
        $("#GANTI_MENU").text("Ganti Nama Menu");
        $("#HARGA").val("");
      }else{
        $("#DIV_MENU_BARU").removeAttr("hidden");
        $("#GANTI_MENU").text("Batal");
        $("#NAMA_MENU").val("");
      }

    });

    $("#GANTI_HARGA").click(function(){
      var sts_harga = $("#GANTI_HARGA").text();
      if (sts_harga == 'Batal') {
        $("#DIV_HARGA_BARU").attr("hidden","true");
        $("#GANTI_HARGA").text("Ganti Nama Menu");
      }else{
        $("#DIV_HARGA_BARU").removeAttr("hidden");
        $("#GANTI_HARGA").text("Batal");
      }
    });
  });
</script>