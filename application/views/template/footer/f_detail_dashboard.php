<!-- <?php
include (APPPATH . 'views/template/footer/f_datatable.php');
?> -->

<script type="text/javascript">
   $(document).ready(function(){
      detailDashboard();
  });


   function detailDashboard(){
      $('#dashboard_dt').DataTable({
        dom: 'Bfrtip',
        "autoWidth": false,
        buttons: [
        {
            extend: 'excel',
            footer:true,
            text: 'Save as Excel',
            title:'Laporan transaksi '+ '<?=$tanggal." ".$cabang?>',
            exportOptions: {
                columns: ':visible'
            }
        }
        ],
        order: [[ 3, "desc" ]],
        scrollX: true,
        scrollCollapse: true,
        fixedColumns: true,
        columnDefs:[{
            "targets": 6,
            "data": function ( row, type, val, meta ) {
                return 'Rp.'+ row[5];
            },
        },
        { "targets":5, "visible":false},
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
            total = api
            .column( 5 ,{ search:'applied' })
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 6 ).footer() ).html(
                '<b>Rp. '+pageTotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +'<small> ( Rp. '+ total.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +' total)</small></b>'
                );
        }
    });
  }


</script>