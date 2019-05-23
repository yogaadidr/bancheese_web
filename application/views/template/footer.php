<footer class="site-footer">
  <div class="row">
    <div class="col-md-6">
      <p class="text-center text-md-left">Copyright © 2019 <a href="http://thetheme.io/theadmin">Salatiga Solution</a>. All rights reserved.</p>
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
  function loadLaporan(){
    var cabang = $("#cabang").val();
    var table = $("#tbl_stok_global").DataTable(); 

    loadPage('laporan/laporanGlobal/'+cabang);
  }

  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var recipient = button.data('whatever') 
    var modal = $(this)

    modal.find('#id_hapus').val(recipient)
  })

  function loadPage(link){
    window.location.href = '<?=base_url()?>'+link;
  }

  function loadModal(val = ''){
    $.ajax({
      type    : 'POST', 
      url     : "<?= isset($link_modal)?$link_modal:''?>" + val ,
      cache   : false,
      success : function(data){ 
        $('.modal-body').html(data);
      }
    });
  }
</script>

<?php 
if ($menu == 'dashboard') {
  include (APPPATH . 'views/template/footer/f_dashboard.php');
}
?>

</body>
</html>