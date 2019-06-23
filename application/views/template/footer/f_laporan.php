<!-- <?php
include (APPPATH . 'views/template/footer/f_datatable.php');
?> -->

<script type="text/javascript">

	$(document).ready(function(){
		detailLaporan();
	});
	function loadLaporan(){
		var cabang = $("#cabang").val();
		loadPage('laporan/laporanGlobal/'+cabang);
	}

	function detailLaporan(){
		$('#tbl_stok_bulan').DataTable({
			"autoWidth": false,
			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'excel',
				footer:true,
				text: 'Save as Excel',
				title:'Laporan ' + '<?=isset($bahan)?$bahan:""?>' ,
				exportOptions: {
					columns: [1,2,3,5,6,8,9,11,12,14]
				}
			},
			{
				extend: 'print',
				footer:true,
				text: 'Print',
				title:'Laporan ' + '<?=isset($bahan)?$bahan:""?>' ,
				exportOptions: {
					columns: [1,2,3,5,6,8,9,11,12,14]
				}
			}
			],
			order: [[ 0, "desc" ]],
			scrollX: true,
			scrollCollapse: true,
			fixedColumns: true,
			columnDefs:[
			{
				"targets": 5,
				"data": function ( row, type, val, meta ) {
					return 'Rp.'+ row[4];
				},
			},
			{
				"targets": 8,
				"data": function ( row, type, val, meta ) {
					return 'Rp.'+ row[7];
				},
			},
			{
				"targets": 11,
				"data": function ( row, type, val, meta ) {
					return 'Rp.'+ row[10];
				},
			},
			{
				"targets": 14,
				"data": function ( row, type, val, meta ) {
					return 'Rp.'+ row[13];
				},
			},
			{"targets":0, "visible":false},
			{"targets":4, "visible":false},
			{"targets":7, "visible":false},
			{"targets":10, "visible":false},
			{"targets":13, "visible":false},
			],
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
            	return typeof i === 'string' ?
            	i.replace(/[\$,]/g, '')*1 :
            	typeof i === 'number' ?
            	i : 0;
            };

            // Total over all pages
            // awal
            totalAwal = api
            .column( 3 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 3 ).footer() ).html(
            	'<small>'+ totalAwal +'</small></b>'
            );

            nilaiAwal = api
            .column( 4 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 5 ).footer() ).html(
            	'<small> Rp. '+ nilaiAwal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'</small></b>'
            );

            // debet
             totalDebet = api
            .column( 6 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 6 ).footer() ).html(
            	'<small>'+ totalDebet +'</small></b>'
            );

            nilaiDebet = api
            .column( 7 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 8 ).footer() ).html(
            	'<small> Rp. '+ nilaiDebet.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'</small></b>'
            );

            // kredit
            // debet
             totalKredit = api
            .column( 9 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 9 ).footer() ).html(
            	'<small>'+ totalKredit +'</small></b>'
            );

            nilaiKredit = api
            .column( 10 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 11 ).footer() ).html(
            	'<small> Rp. '+ nilaiKredit.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'</small></b>'
            );

            // saldo akhir
             totalSaldo = api
            .column( 12 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 12 ).footer() ).html(
            	'<small>'+ totalSaldo +'</small></b>'
            );

            nilaiSaldo = api
            .column( 13 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 14 ).footer() ).html(
            	'<small> Rp. '+ nilaiSaldo.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'</small></b>'
            );
        }
    });
	}
</script>