<?php
$id_transaksi = "";
$id_kategori = "";
$biaya = "";
$keterangan = "";

if ($pengeluaran != null) {
  $id_transaksi = $pengeluaran['ID_TRANSAKSI_KREDIT'];
  $id_kategori = $pengeluaran['ID_KATEGORI'];
  $biaya = $pengeluaran['BIAYA'];
  $keterangan = $pengeluaran['KETERANGAN'];
}
?>
<div class="main-content">
  <a href="javascript:history.back()"><span class="fa fa-arrow-left"></span> Kembali</a>
  <div class="row" style="position: relative;">

    <div class="col-md-12">
      <div class="card card-body">
        <h3><?= $opt ?> Pengeluaran</h3>
        <form action="<?= $link ?>" method="POST">
          <div class="row">
            <div class="col-md-12">
              <?php
              if($this->session->flashdata("status") != null){
                echo $this->session->flashdata("status");
              }
              ?>

              <div class="form-group">
                <input type="text" class="form-control" name="ID_TRANSAKSI_KREDIT" value="<?=$id_transaksi?>" id="ID_TRANSAKSI_KREDIT" hidden>
                <input type="text" class="form-control" name="ID_CABANG" value="<?= isset($id_cabang)?$id_cabang:'' ?>" id="ID_CABANG" hidden>

                <label for="bahan_baku">Nama bahan baku</label>
                <select name="KATEGORI" class="form-control">
                  <?php foreach ($kategori as $kategori) : ?>
                    <option value="<?= $kategori['ID_KATEGORI'] ?>" ><?= $kategori['JENIS'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan">Biaya</label>
                <input type="text" class="form-control" name="BIAYA" value="<?=$biaya?>" placeholder="Biaya" id="BIAYA">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan">Keterangan</label>
                <textarea name="KETERANGAN" class="form-control"><?=$keterangan?></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
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
    var qty =  parseInt($('#QTY').val());
    var stk =  parseInt($('#STOK').val());

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

  function getIdBahan(){
    var getId =  $('#bahan').val();
    $('#ID_BAHAN').val(getId);
  }
</script>