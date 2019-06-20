<script type="text/javascript">
 $(document).ready(function(){
  loadTrendGraph();
});

 function loadTrend(){
  var periode = $("#periode").val();
  var cabang = $("#cabang").val();
  var bulan = $("#bulan").val();
  var tahun = $("#tahun").val();

  var qwr_string = "?periode="+periode+"&cabang="+cabang+"&bulan="+bulan+"&tahun="+tahun;

  loadPage("Dashboard/Trend/loadTrendDaily"+qwr_string);
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