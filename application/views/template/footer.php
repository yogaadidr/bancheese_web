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

<script type="text/javascript">
  function fetchdata(){
   $.ajax({
    url: '<?php echo base_url();?>Notif/getNotif',
    dataType: 'JSON',

    success: function(data){
      var html='';
      for (var i = 0; i < data['count_notif']; i++) {
        var newMedia = data['data'][i]['VIEWED']==0?"media-new":"";
        html += '<a class="media '+newMedia+'" href="#" onClick="updateNotif('+data['data'][i]['ID_NOTIF']+')"><span class="avatar bg-success"><i class="fa fa-bell"></i></span><div class="media-body"><p>'+data['data'][i]['MESSAGE']+'</p><time>'+data['data'][i]['DTM_CRT']+'</time></div></a>'
      }
      $("#printNotif").html(html);
      if (data['sum_notif'] > 0) {
        $("#sum_notif").text(data['sum_notif']);
        $("#bell").addClass("has-new");
      }else{
        $("#sum_notif").text("");
        $("#bell").removeClass("has-new");
      }
    },
    complete:function(data){
     setTimeout(fetchdata,2000);
   }
 });
 }

 function updateNotif(id){
   $.ajax({
    url: '<?php echo base_url();?>Notif/updateNotif/'+id,
    dataType: 'JSON'
  });
 }

 function deleteNotif(){
   $.ajax({
    url: '<?php echo base_url();?>Notif/deleteNotif',
    dataType: 'JSON'
  });
 }

 $(document).ready(function(){
   setTimeout(fetchdata,2000);
 });



</script>

</body>
</html>