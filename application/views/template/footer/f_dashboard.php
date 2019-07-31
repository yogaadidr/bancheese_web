<script type="text/javascript">
 $(document).ready(function(){
  loadTrendGraph();
  loadTable();
});

 function loadTrend(){
  var periode = $("#periode").val();
  var cabang = $("#cabang").val();
  var bulan = $("#bulan").val()
  var tahun = $("#tahun").val();
  var grafik = $("#grafik").val();
  var status = $("#status").val();

  var qwr_string = "?periode="+periode+"&cabang="+cabang+"&bulan="+bulan+"&tahun="+tahun+"&grafik="+grafik+"&status="+status;

  loadPage("Dashboard/Trend/loadTrendDaily"+qwr_string);
}

function loadTable(){
  $('#tbl_dashboard').DataTable({
    "autoWidth": false,
    order: [[ 0, "desc" ]],
    scrollCollapse: true,
    fixedColumns: true,
    columnDefs:[{
      "targets": 4,
      "data": function ( row, type, val, meta ) {
        return 'Rp.'+ row[3];
      },
    },
    {
      "targets": 6,
      "data": function ( row, type, val, meta ) {
        return 'Rp.'+ row[5];
      },
    },
    {
      "targets": 8,
      "data": function ( row, type, val, meta ) {
        return 'Rp.'+ row[7];
      },
    },
    { "targets":0, "visible":false},
    { "targets":3, "visible":false},
    { "targets":5, "visible":false},
    { "targets":7, "visible":false},
    <?=($get_grafik=='Netto' && $status == 'Sukses')?'
      { "targets":6, "visible":true},
      { "targets":8, "visible":true},
      { "targets":9, "visible":false},'
    :'
      { "targets":6, "visible":false},
      { "targets":8, "visible":false},
    '?>
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

    totalItem = api
    .column( 2 ,{ search:'applied' })
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    // Total over this page
    pageTotalItem = api
    .column( 2, { page: 'current'} )
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    // Update footer
    $( api.column( 2 ).footer() ).html(
      '<b>'+pageTotalItem+'<small> ( '+ totalItem+' total)</small></b>'
      );

    // Total over all pages
    total = api
    .column( 3 ,{ search:'applied' })
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    // Total over this page
    pageTotal = api
    .column( 3, { page: 'current'} )
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    // Update footer
    $( api.column( 4 ).footer() ).html(
      '<b>Rp. '+pageTotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'<small> ( Rp. '+ total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +' total)</small></b>'
      );


    totalKredit = api
    .column( 5 ,{ search:'applied' })
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    pageKredit = api
    .column( 5 ,{ search:'applied' })
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    $( api.column( 6 ).footer() ).html(
      '<b>Rp. '+pageKredit.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'<small> ( Rp. '+ totalKredit.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +' total)</small></b>'
      );


    totalNett = api
    .column( 7 ,{ search:'applied' })
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );
    pageNett = api
    .column( 7 ,{ search:'applied' })
    .data()
    .reduce( function (a, b) {
      return intVal(a) + intVal(b);
    }, 0 );

    $( api.column( 8 ).footer() ).html(
      '<b>Rp. '+pageNett.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'<small> ( Rp. '+ totalNett.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +' total)</small></b>'
      );
  }
});
}

function loadTrendGraph(){
  app.ready(function(){

    Morris.Area({
      element: 'report',
      data: [
      <?php 
      if (isset($detail_penjualan)) {
        foreach ($detail_penjualan as $dp) {
          if ($get_grafik=='Trend') {?>
            { days: "<?=$dp['TGL_TRANSAKSI']?>", a: <?=$dp['NET_HARGA']?>},
          <?php }else{?>
            { days: "<?=$dp['TGL_TRANSAKSI']?>", a: <?=$dp['NET_HARGA']?>, b:<?=$dp['DEBET']+$dp['PENGELUARAN']?>},
          <?php }} }?>
          ],
          xkey: 'days',
          parseTime: false,
          ykeys: <?=$get_grafik=='Trend'?"['a']":"['a','b']"?>,
          labels: ['Total Income','Total Pengeluaran'],
          pointSize: 3,
          fillOpacity: 0.4,
          pointStrokeColors: <?=$get_grafik=='Trend'?"['#a0d0e0']":"['#a0d0e0','#b1bccb']"?>,
          behaveLikeLine: true,
          gridLineColor: '#ebebeb',
          hideHover: 'auto',
          lineColors: <?=$get_grafik=='Trend'?"['#a0d0e0']":"['#a0d0e0','#b1bccb']"?>,
          resize: true
        });

  });
}


</script>