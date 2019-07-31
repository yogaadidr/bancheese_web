<?php 
$get_per = ($this->input->get('periode')=='')?'Daily':$this->input->get('periode');
$get_idCabang = ($this->input->get('cabang')=='')?'all':$this->input->get('cabang');
?>
<div class="main-content">
	<div class="row" style="position: relative;">
		<div class="col-lg-12">
			<div class="card card-body">
				<h3><?=$status=='Sukses'?$get_grafik:'Transaksi Pending'?></h3>
				<div class="row">
					<div class="col-md-2">
						<h6><strong>Periode</strong></h6>
						<select class="form-control" id="periode" onchange="loadTrend()">
							<option disabled selected>Pilih Periode</option>
							<option value="<?=preg_replace('/(loadTrend|[();])/', "",$periode)?>" <?=$periode!=''?'selected':''?> hidden><?=preg_replace('/(loadTrend|[();])/', "",$periode)?></option>
							<option value="Daily">Daily</option>
							<option value="Monthly">Monthly</option>
							<option value="Yearly">Yearly</option>
						</select>
					</div>
					<div class="col-md-2">
						<h6><strong>Cabang</strong></h6>
						<select class="form-control" id="cabang" onchange="loadTrend()">
							<option disabled>Pilih Cabang</option>
							<option selected value="">Semua</option>
							<?php
							foreach ($master_cabang as $cb) {?>
								<option <?=($cabang==$cb['ID_CABANG']?'selected':'')?> value="<?=$cb['ID_CABANG']?>"><?=$cb['NAMA_CABANG']?></option>
							<?php }
							?>
						</select>
					</div>
					<div class="col-md-2" <?=in_array($periode,array("Daily") )?'':'hidden'?>>
						<h6><strong>Bulan</strong></h6>
						<select class="form-control" id="bulan" onchange="loadTrend()">
							<option disabled selected>Pilih Bulan</option>
							<?php 
							foreach ($master_bulan as $bl) {?>
								<option <?=($bulan==$bl['id']?'selected':'')?> value="<?=$bl['id']?>"><?=$bl['bulan']?></option>
							<?php }
							?>
						</select>
					</div>
					<div class="col-md-2" <?=in_array($periode,array("Monthly","Daily"))?'':'hidden'?>>
						<h6><strong>Tahun</strong></h6>
						<select class="form-control" id=tahun onchange="loadTrend()">
							<option disabled selected>Pilih Tahun</option>
							<?php 
							foreach ($master_tahun as $th) {?>
								<option <?=($tahun==$th['VAL']?'selected':'')?> value="<?=$th['VAL']?>"><?=$th['VAL']?></option>
							<?php }
							?>
						</select>
					</div>
					<div class="col-md-2" <?=$status=='Pending'?'hidden':''?>>
						<h6><strong>Grafik</strong></h6>
						<select class="form-control" id="grafik" onchange="loadTrend()">
							<option disabled selected>Pilih Grafik</option>
							<option value="Trend" <?=$get_grafik=='Trend'?'selected':''?>>Trend</option>
							<option value="Netto" <?=$get_grafik=='Netto'?'selected':''?>>Netto</option>
						</select>
					</div>
					<div class="col-md-2">
						<h6><strong>Status</strong></h6>
						<select class="form-control" id="status" onchange="loadTrend()">
							<option disabled selected>Status</option>
							<option value="Sukses" <?=$status=='Sukses'?'selected':''?>>Sukses</option>
							<option value="Pending" <?=$status=='Pending'?'selected':''?>>Pending</option>
						</select>
					</div>
				</div>

				<div <?=$status=='Pending'?'hidden':''?>>
					<h4 class="card-title" align="center"><strong>Trend</strong></h4>
					<ul class="list-inline text-center gap-items-4 mb-30">
					</ul>
					<div class="card-body">
						<div id="report" data-provide="morris"></div>
					</div>
				</div>
				<div>
					<h4 class="card-title" align="center"><strong>Tabel</strong> <?=$status=='Sukses'?$get_grafik:'Transaksi Pending'?></h4>
					<div class="card-body">
						<table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl_dashboard">
							<thead>
								<tr>
									<th>Sort</th>
									<th>Periode</th>
									<th width="14%">Jumlah Item</th>
									<th>Total Pemasukan Hide</th>
									<th>Total</th>
									<th>Pengeluaran</th>
									<th>Nett Pendapatan</th>
									<th width="5%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($detail_penjualan)) {
								 foreach ($detail_penjualan as $dp) {?>
									<tr>
										<td><?=$dp['PERIODE']?></td>
										<td><?=$dp['TGL_TRANSAKSI']?></td>
										<td><?=$dp['QTY']?></td>
										<td><?=number_format($dp['NET_HARGA'],2)?></td>
										<td><?=$dp['NET_HARGA']?></td>
										<td><?=$dp['DEBET']+$dp['PENGELUARAN']?></td>
										<td><?=number_format(($dp['NET_HARGA'] - ($dp['DEBET']+$dp['PENGELUARAN'])),2)?></td>
										<td><a href="<?=base_url('Dashboard/detailDashboard/').$dp['PERIODE'].'/'.$get_per.'/'.$get_idCabang."/$status"?>" class="btn btn-sm btn-warning"><i class="fa fa-file-text"></i> Detail Penjualan</a></td>
									</tr>
								<?php }}?>
							</tbody>
							<tfoot>
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
</div>
