<div class="main-content">
  <div class="row" style="position: relative;">
    <div class="col-md-12">
      <div class="card card-body">
        <h3>Laporan Gudang Bahan</h3>
        <div class="row">
          <div class="col-md-3">
            <h6><strong>Cabang</strong></h6>
            <select class="form-control" id="cabang" onchange="loadLaporan()">
              <option disabled selected>Pilih Cabang</option>
              <?php
              foreach ($master_cabang as $cb) {?>
                <option <?=($cabang==$cb['ID_CABANG']?'selected':'')?> value="<?=$cb['ID_CABANG']?>"><?=$cb['NAMA_CABANG']?></option>
              <?php }
              ?>
            </select>
          </div>
        </div>
        <br/>
        <?php 
        $hidden = ($cabang != '' && $saldo_total!==NULL)?'':'hidden';
        if ($hidden != '') {?>
          <span style="text-align: center"><h6 style="color:#d33d33;"><?=($cabang==NULL)?'Pilih Cabang':'Data Kosong'?></h6></span>
        <?php }
        ?>
        <div class="flexbox" style="margin-top: 20px;" <?=$hidden?>>
          <table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl_stok_global">
            <thead>
              <tr>
                <td>Nama Bahan</td>
                <td>Satuan</td>
                <td>Total Debet</td>
                <td>Total Kredit</td>
                <td>Saldo</td>
                <td>Harga</td>
                <td width="5%">Action</td>
              </tr> 
            </thead>
            <tbody>
              <?php
              if ($cabang != '' || isset($saldo_total)){
               foreach ($saldo_total as $saldo) {?>
                <tr>
                  <td><?=$saldo['NAMA_BAHAN']?></td>
                  <td><?=$saldo['SATUAN']?></td>
                  <td><?=$saldo['DEBET']?></td>
                  <td><?=$saldo['KREDIT']?></td>
                  <td><?=$saldo['SALDO']?></td>
                  <td><?=number_format($saldo['HARGA'],2)?></td>
                  <td><a href="<?=base_url('Laporan/laporanDetailBulan/').$cabang.'?bahan='.$saldo['NAMA_BAHAN'].'&harga='.$saldo['HARGA']?>" class="btn btn-warning btn-sm"><span class="fa fa fa-arrow-right"></span> Lihat Detail</a></td>
                </tr>
                <?php 
              }}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

