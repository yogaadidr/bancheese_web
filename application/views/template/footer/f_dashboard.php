<script type="text/javascript">
 $(document).ready(function(){
  loadTrendGraph();
  loadTable();
});

 function loadTrend(){
  var periode = $("#periode").val();
  var cabang = $("#cabang").val();
  var bulan = $("#bulan").val();
  var tahun = $("#tahun").val();

  var qwr_string = "?periode="+periode+"&cabang="+cabang+"&bulan="+bulan+"&tahun="+tahun;

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
    { "targets":0, "visible":false},
    { "targets":3, "visible":false}
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
        foreach ($detail_penjualan as $dp) {?>
          { days: "<?=$dp['TGL_TRANSAKSI']?>", a: <?=$dp['NET_HARGA']?>},
        <?php } }?>
        ],
        xkey: 'days',
        parseTime: false,
        ykeys: ['a'],
        labels: ['Total Income'],
        pointSize: 3,
        pointStrokeColors: ['#a0d0e0'],
        behaveLikeLine: true,
        gridLineColor: '#ebebeb',
        hideHover: 'auto',
        lineColors: ['#a0d0e0'],
        resize: true
      });

  });
}


</script>