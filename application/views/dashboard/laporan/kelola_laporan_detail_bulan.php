<div class="main-content">
  <div class="row" style="position: relative;">
    <div class="col-md-12">
      <div class="card card-body">
        <a href="javascript:history.back()"><span class="fa fa-arrow-left"></span> Kembali</a>
        <h5><?=$bahan?></h5>
        <div class="flexbox" style="margin-top: 20px;">
          <table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl_stok_bulan">
            <thead>
              <tr>
                <td>Sort</td>
                <td>Periode</td>
                <td>Harga</td>
                <td>Saldo Awal <small>(akumulasi)</small></td>
                <td>Nilai Saldo Awal Hide</td>
                <td>Nilai</td>
                <td>Debet</td>
                <td>Nilai Debet Hide</td>
                <td>Nilai</td>
                <td>Kredit</td>
                <td>Nilai Kredit Hide</td>
                <td>Nilai</td>
                <td>Saldo Akhir</td>
                <td>Nilai Hide</td>
                <td>Nilai</td>
                <td width="5%">Action</td>
              </tr> 
            </thead>
            <tbody>
              <?php 
              if (isset($saldo_bulan)) {
              foreach ($saldo_bulan as $saldo) {?>
                <tr>
                  <td><?=$saldo['TGL_TRANSAKSI']?></td>
                  <td><?=$saldo['PERIODE']?></td>
                  <td><?=number_format($saldo['HARGA'],2)?></td>
                  <td><?=($saldo['SALDO_AWAL']!='')?$saldo['SALDO_AWAL']:'Awal'?></td>
                  <td><?=number_format($saldo['SALDO_AWAL']*$saldo['HARGA'])?></td>
                  <td><?=number_format($saldo['SALDO_AWAL']*$saldo['HARGA'])?></td>
                  <td><?=$saldo['DEBET']?></td>
                  <td><?=number_format($saldo['DEBET']*$saldo['HARGA'])?></td>
                  <td><?=number_format($saldo['DEBET']*$saldo['HARGA'])?></td>
                  <td><?=$saldo['KREDIT']?></td>
                  <td><?=number_format($saldo['KREDIT']*$saldo['HARGA'])?></td>
                  <td><?=number_format($saldo['KREDIT']*$saldo['HARGA'])?></td>
                  <td><?=$saldo['SALDO']?></td>
                  <td><?=number_format($saldo['SALDO']*$saldo['HARGA'])?></td>
                  <td><?=number_format($saldo['SALDO']*$saldo['HARGA'])?></td>
                  <td><a href="#" data-toggle="modal" data-target="#modal" class="btn btn-warning btn-sm" onclick='loadModal("<?=$saldo['TGL_TRANSAKSI']?>")'><span class="fa fa fa-eye"></span> Detail Stok</a>
                  </td>
                </tr>
              <?php }}?>
            </tbody>
            <tfoot>
              <td></td>
              <td colspan="2" align="right"><b>Total</b></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
