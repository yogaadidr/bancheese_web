<footer class="site-footer">
  <div class="row">
    <div class="col-md-6">
      <p class="text-center text-md-left">Copyright©2019 - Powered By <a href="#">Anasera Studio</a>.</p>
    </div>

    <div class="col-md-6">
    </div>
  </div>
</footer>

</main>



<div id="qv-global" class="quickview" data-url="<?= base_url() ?>assets/theadmin/assets/data/quickview-global.html">
  <div class="spinner-linear">
    <div class="line"></div>
  </div>
</div>

<script src="<?= base_url() ?>assets/theadmin/assets/js/app.min.js"></script>

<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var recipient = button.data('whatever') 
    var modal = $(this)

    modal.find('#id_hapus').val(recipient)
  })

  function loadPage(link){
    window.location.href = '<?=base_url()?>'+link;
  }

  function loadModal(harga='',periode = ''){
    $.ajax({
      type    : 'POST', 
      url     : "<?= isset($link_modal)?$link_modal:''?>" + harga + '/' + periode ,
      cache   : false,
      success : function(data){ 
        $('.modal-body').html(data);
      }
    });
  }
</script>



<?php 
include (APPPATH . 'views/template/footer/f_datatable.php');
if ($menu == 'dashboard') {
  if (isset($sub_menu) && $sub_menu == 'dashboard_detail') {
    include (APPPATH . 'views/template/footer/f_detail_dashboard.php');
  }else{
    include (APPPATH . 'views/template/footer/f_dashboard.php');
  }
}elseif ($menu == 'laporan'){
  include (APPPATH . 'views/template/footer/f_laporan.php');
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tbl').DataTable({
      "autoWidth": false,
      scrollCollapse: true,
      fixedColumns: true,
    });
  });
</script>

</body>
</html>