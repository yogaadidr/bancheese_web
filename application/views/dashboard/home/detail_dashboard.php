<div class="main-content">
  <div class="row" style="position: relative;">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="javascript:history.back()"><span class="fa fa-arrow-left"></span> Kembali</a>
          <h3>Detail Transaksi <?=$tanggal." ".$cabang?></h3>
          <table id="dashboard_dt" class="table table-striped table-bordered"cellspacing="0" data-provide="datatables">
            <thead>
              <tr>
                <th>Nama Menu</th>
                <th>Metode</th>
                <th>Harga</th>
                <th>Qyt</th>
                <th>Diskon</th>
                <th>Net Harga</th>
                <th>Net Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($t_detail)) {
                foreach ($t_detail as $td) {?>
                  <tr>
                    <td><?=$td['NAMA_MENU']?></td>
                    <td><?=$td['METODE_PEMBAYARAN']?></td>
                    <td>Rp. <?=number_format($td['HARGA'],2)?></td>
                    <td><?=$td['QTY']?></td>
                    <td><?=number_format($td['DISKON'],1)?>%</td>
                    <td><?=number_format($td['NET_HARGA'],2)?></td>
                    <td><?=number_format($td['NET_HARGA'],2)?></td>
                  </tr>
                <?php }}?>
              </tbody>

              <tfoot>
                <tr>
                  <td colspan="6" align="right"><b>Total</b></td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

