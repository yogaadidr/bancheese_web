<h5><?=$bahan?></h5>
<table width="100%" class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl_stok_hari">
	<thead>
		<tr>
			<td>Periode</td>
			<td>Pemasukan</td>
			<td>Pengeluaran</td>
		</tr> 
	</thead>
	<tbody>
		<?php if ($saldo_hari != null) {
		foreach ($saldo_hari as $saldo) {?>
			<tr>
				<td><?=$saldo['TGL_TRANSAKSI']?></td>
				<td><?=$saldo['DEBET']?></td>
				<td><?=$saldo['KREDIT']?></td>
			</tr>
		<?php }}?>
	</tbody>
</table>