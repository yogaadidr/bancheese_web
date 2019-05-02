 <?php
 $id_cabang = "";
 $nama_cabang = "";
 $alamat = "";
 $nama_pemilik = "";
 $jam_buka = 0;
 $jam_tutup = 0;
 $printer = 0;
 $no_hp = 0;
 if($list != null){
  $id_cabang = $list['ID_CABANG'];
  $nama_cabang = $list['NAMA_CABANG'];
  $alamat = $list['ALAMAT'];
  $nama_pemilik = $list['NAMA_PEMILIK'];
  $jam_buka = $list['JAM_BUKA'];
  $jam_tutup = $list['JAM_TUTUP'];
  $printer = $list['PRINTER'];
  $no_hp = $list['NO_HP'];
 }
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
                      <label for="email">Nama cabang</label>
                      <input type="hidden" class="form-control" name="NO_HP" value="<?= $no_hp ?>">
                      <input type="hidden" class="form-control" name="PRINTER" value="<?= $printer ?>">
                      <input type="hidden" class="form-control" name="ID_CABANG" value="<?= $id_cabang ?>">
                      <input type="text" class="form-control" name="NAMA_CABANG" value="<?= $nama_cabang ?>" placeholder="Nama Cabang" id="NAMA_CABANG">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pwd">Alamat</label>
                      <textarea class="form-control" name="ALAMAT" id="ALAMAT"><?= $alamat ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pwd">Nama Pemilik</label>
                      <input type="text" class="form-control" name="NAMA_PEMILIK" placeholder="Nama Pemilik" value="<?= $nama_pemilik ?>" id="NAMA_PEMILIK">
                     
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pwd">Jam Buka</label>
                      <select name="JAM_BUKA" class="form-control">
                        <?php foreach ($jam as $j_buka) : ?>
                          <option value="<?= $j_buka ?>" <?php if($j_buka == $jam_buka){echo "selected";} ?>><?= $j_buka ?></option>
                        <?php endforeach; ?>
                      </select>
                     
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pwd">Jam Tutup</label>
                      <select name="JAM_TUTUP" class="form-control">
                        <?php foreach ($jam as $j_tutup) : ?>
                          <option value="<?= $j_tutup ?>" <?php if($j_tutup == $jam_tutup){echo "selected";} ?>><?= $j_tutup ?></option>
                        <?php endforeach; ?>
                      </select>
                     
                    </div>
                  </div>

                </div>
                

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url()."cabang/" ?>" class="btn btn-warning">Kembali</a>
              </form>

            </div>
          </div>





        </div>
      </div><!--/.main-content -->