<?php
$id_versi ="";
$major = "";
$minor = "";
$patch = "";
$apklink = "";
$deskripsi = "";

if($list != null){
  $id_versi =$list['ID_VERSI'];
  $major = $list['MAJOR'];
  $minor = $list['MINOR'];
  $patch = $list['PATCH'];
  $link = $list['LINK'];
  $deskripsi = $list['DESKRIPSI'];
}
?>
<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> APK</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">

            <div class="col-md-12">

              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_VERSI" value="<?= $id_versi ?>" id="ID_VERSI" hidden>

                <label for="major">Major</label>
                <input type="text" class="form-control" name="MAJOR" value="<?= $major?>" placeholder="Major" id="MAJOR">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
               <label for="major">Minor</label>
               <input type="text" class="form-control" name="MINOR" value="<?= $minor?>" placeholder="Minor" id="MINOR">
             </div>
           </div>

           <div class="col-md-12">
            <div class="form-group">
             <label for="major">Patch</label>
             <input type="text" class="form-control" name="PATCH" value="<?= $minor?>" placeholder="Pacth" id="PATCH">
           </div>
         </div>

         <div class="col-md-12">
          <div class="form-group">
           <label for="major">Link</label>
           <input type="text" class="form-control" name="LINK" value="<?= $apklink?>" placeholder="Link" id="LINK">
         </div>
       </div>

       <div class="col-md-12">
        <div class="form-group">
         <label for="major">Deskripsi</label>
         <textarea class="form-control" name="DESKRIPSI"  placeholder="Deskripsi" id="DESKRIPSI">
          <?= $deskripsi?>
        </textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url()."download/" ?>" class="btn btn-warning">Kembali</a>
  </form>

</div>
</div>
</div>
</div>