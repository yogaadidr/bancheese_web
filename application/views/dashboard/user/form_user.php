<?php
$id_user ="";
$nama = "";
$hp = "";
$role = "";
$id_cabang = "0";
$alamat = "";
$username = "";
if ($list != null) {
  $id_user = $list['ID_USER'];
  $nama = $list['NAMA_USER'];
  $hp = $list['NO_HP'];
  $role = $list['ROLE'];
  $id_cabang = $list['ID_CABANG'];
  $alamat = $list['ALAMAT'];
  $username = $list['USERNAME'];
}
?>
<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> User</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_USER" value="<?= $id_user ?>" id="ID_MENU" hidden>

                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="NAMA" value="<?= $nama ?>" placeholder="Nama Lengkap" id="NAMA">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="ROLE" id="ROLE">
                  <option value="0" selected disabled="">Select Role</option>
                  <option value="ADMIN" <?= ($role=='ADMIN')?'selected':''?>>Admin</option>
                  <option value="KASIR" <?= ($role=='KASIR')?'selected':''?>>Kasir</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="hp">No HP</label>
                <input type="text" class="form-control" name="HP" value="<?= $hp ?>" placeholder="No Hp" id="HP">
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="role">Cabang</label>
                <select class="form-control" name="CABANG" id="CABANG">
                  <option value="0" selected disabled="">Select Cabang</option>
                  <?php
                  foreach ($cabang as $cb) {?>
                    <option value="<?= $cb['ID_CABANG'] ?>"
                      <?= ($cb['ID_CABANG']==$id_cabang)?'selected':''?>><?=$cb['NAMA_CABANG']?></option>
                    <?php }
                    ?>
                  </select>
                </div>
              </div> -->
              <div class="col-md-12">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" name="ALAMAT" id="ALAMAT"><?=$alamat?></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="USERNAME" value="<?=$username?>" placeholder="Username" id="USERNAME">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="pwd">Password</label>
                  <input type="Password" class="form-control" name="PASSWORD" placeholder="Password" id="PASSWORD">
                </div>
              </div>
              
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url()."user/" ?>" class="btn btn-warning">Kembali</a>
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