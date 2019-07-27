<?php
$link_del = ($opt=='Kredit')?'cabang/hapusKreditCabang':'cabang/hapusDebetCabang';
?>
<div class="main-content">
  <a href="javascript:history.back()"><span class="fa fa-arrow-left"></span> Kembali</a>
  <div class="row" style="position: relative;">
    <div class="col-md-6" <?=$opt=='Tambah'?'hidden':''?>>
      <div class="card card-body">
        <h3>Daftar <?= $opt.' '.$this->input->get("nm") ?></h3>
        <div class="flexbox">
          <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables"  id="tbl">
            <thead>
              <tr>
                <th width="20">No.</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>Qty</th>
                <th width="20">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $i = 1;
              if ($list != null) {
                foreach ($list as $list){ 
                  ?>
                  <tr>
                    <td><?= $i ?>.</td>
                    <td><?= $list['TANGGAL']?></td>
                    <td>Rp. <?= number_format($list['HARGA'])?></td>
                    <td><?= $list['QTY']?></td>
                    <td>
                      <div class="dropdown dropleft">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm no-arrow" data-toggle="dropdown">
                          <span class="fa fa-ellipsis-v"></span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="<?=($opt=='Kredit')?$list['ID_KREDIT']:$list['ID_DEBET']?>">Hapus <i class="fa fa-trash-o"></i></a>
                        </div>

                      </div>
                    </td>
                  </tr>
                  <?php $i++; 
                } 
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
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
                <input type="text" class="form-control" name="ID_BAHAN" value="<?= isset($id_bahan)?$id_bahan:'' ?>" id="ID_BAHAN" hidden>
                <input type="text" class="form-control" name="ID_CABANG" value="<?= isset($id_cabang)?$id_cabang:'' ?>" id="ID_CABANG" hidden>
                <input type="text" class="form-control" name="ID_DEBET" value="<?= $this->input->get("db")?>" id="ID_DEBET" hidden>

                <label for="bahan_baku">Nama bahan baku</label>
                <?php if ($opt=='Tambah') {?>
                  <select class="form-control" id=bahan>
                    <option disabled selected>Pilih Bahan</option>
                    <?php 
                    foreach ($master_bahan as $bahan) {?>
                      <option value="<?=$bahan['ID_BAHAN']?>"><?=$bahan['NAMA_BAHAN']?></option>
                    <?php }
                    ?>
                  </select>
                <?php }else{?>
                <input type="text" class="form-control" name="NAMA_BAHAN" value="<?= $this->input->get("nm")?>" placeholder="Nama Bahan Baku" id="NAMA_BAHAN" readonly>
              <?php } ?>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="satuan">Harga</label>
              <input type="text" class="form-control" name="HARGA" value="<?= $this->input->get("hrg")?>" placeholder="Harga" id="HARGA" <?=$opt=='Tambah'?'':'readonly'?>>
            </div>
          </div>

          <div class="col-md-12" <?=($opt=='Kredit')?'':'style="display:none"'?>>
            <div class="form-group">
              <label for="satuan">Stok Sisa</label>
              <input type="text" class="form-control" name="STOK" value="<?= $this->input->get("stk")?>" placeholder="Stok" id="STOK" readonly>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="satuan">Qty <?= $opt ?></label>
              <i id="MSG" style="color: #e74c3c"></i>
              <input type="text" class="form-control" name="QTY" value="" onblur="cekSaldo()" placeholder="Qty <?= $opt ?>" id="QTY" required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>

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
      <form method="post" action="<?= base_url().$link_del?>">

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

<script type="text/javascript">
  function cekSaldo(){
    var action = "<?=$opt?>";
    var qty =  $('#QTY').val();
    var stk =  $('#STOK').val();

    if (action == "Kredit") {
      if (qty>stk) {
        $('#MSG').text("*Qty melebihi stok");
        $('#QTY').val('');
      }else if (qty<1) {
        $('#MSG').text("*Qty harus lebih dari 0");
        $('#QTY').val('');
      }else{
        $('#MSG').text("");
      }
    }else if (qty<1) {
      $('#MSG').text("*Qty harus lebih dari 0");
      $('#QTY').val('');
    }
  }
</script>