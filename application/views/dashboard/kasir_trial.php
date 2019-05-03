<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
    <meta name="keywords" content="login, signin">

    <title>Kasir Trial</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="<?= base_url() ?>assets/theadmin/assets/css/core.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/theadmin/assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/theadmin/assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="<?= base_url() ?>assets/theadmin/assets/img/favicon.png">

<style>
.text-harga{
    font-weight:bold;
    display:block;
    text-align:right;
}
.text-nama{
    
}
.list-menu{
    border-bottom:1px solid #fafafa;
    padding: 16px;
    position:relative;
}
.list-menu a{
    color:black;
}
.list-menu:hover{
    background:#f0f0f0;
}
.list-menu:focus{
    background:#f0f0f0;
}
.p0{
    padding:0;
}
.card-button-bottom{
    position:fixed;bottom:0;width:100%
} 
.btn-bayar{
    background:#15c377;
    color:white;
    border-radius:4px;
    padding:8px;
    margin-left:0;
    margin-right:0;

}
.btn-bayar .col span{
    font-size:16px;
}
.tambah-menu{
    display:inline-block;
    border:1px solid #15c377;
    border-radius:2px;
    float:right;
    margin-top:16px;
}
.tambah-menu button{
    background:#15c377;
    color:white;
    border:0;
    padding:0 8px;
}
.tambah-menu .jumlah{
    width:30px;
    text-align:right;
    display:inline-block;
}
.text-qty{
    border-radius:16px;
    border:1px solid #dadada;
    width:30px;
    height:30px;
    font-weight:bold;
    display:inline-block;
    text-align:center;
}
</style>
</head>



  <body>


    <div class="row no-gutters min-h-fullscreen bg-white" id="screen1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header " style="text-align:center"><a href="<?= base_url()?>"><i class="fa fa-chevron-left"></i>
            </a><span style="text-align:center;">Daftar Menu</span></div>
                <div class="card-body p0">
                    <?php
                        $i = 1;

                        foreach($list as $menu): 
                        $nama = $menu['NAMA_MENU'];
                        $harga = $menu['HARGA']
                        ?>
                        <div class="list-menu">
                            <a href="#" onCLick="tambahMenu(<?=$i?>,'<?= $nama ?>',<?= $harga ?>)">
                            <div class="row">
                                <div class="col-6"><span class="text-nama"><?= $nama ?></span></div>
                                <div class="col-6">
                                <span class="text-harga">Rp. <?= number_format($harga) ?></span></div>
                                <div class="col-8"></div>
                                <div class="col-4">
                                <div class="tambah-menu" id="tambah-menu-<?= $i ?>" style="display:none">
                                <div><button onclick="kurangMenu(<?=$i?>,'<?= $nama ?>',<?= $harga ?>)" id="min-<?=$i ?>">-</button> <span id="jml-<?=$i ?>" class="jumlah">0</span> <button id="add-<?=$i ?>">+</button></div>
                            </div>
                                </div>
                            </div>
                            
                            </a>
                        </div>    
                    <?php $i++;endforeach;
                    ?>


                </div>
                <div class="card-footer card-button-bottom" >
                    <div class="row btn-bayar" onClick="invoice()">
                                <div class="col"><span class="text-nama" id="total_detail">Lihat Detail</span></div>
                                <div class="col">
                                <span class="text-harga" id="total_harga">Rp. 0</span></div>
                            </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row no-gutters min-h-fullscreen bg-white" id="screen2" style="display:none">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header " style="text-align:center"><a href="#" onClick="invoice()"><i class="fa fa-close"></i>
            </a><span style="text-align:center;">Invoice</span></div>
                <div class="card-body p0" id="list">
              
                </div>
                <div class="row">
                    <div class="col-12"  style="text-align:right;margin-top:16px;"><span style="text-align:right;padding:16px;font-size:16px;font-weight:bold" id="total">Total</span></div>
                </div>
                <div class="card-footer card-button-bottom" >
                    <div class="row btn-bayar" >
                                <div class="col" style="text-align:center">
                                    <span style="font-size:16px;">BAYAR</span>
                            </div>
                </div>
            </div>
        </div>
        
    </div>




    <!-- Scripts -->
    <script src="<?= base_url() ?>assets/theadmin/assets/js/core.min.js"></script>
    <script src="<?= base_url() ?>assets/theadmin/assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/theadmin/assets/js/script.min.js"></script>

    <script>
        var pesanan = [];
        var total = 0;
        var total_harga = 0;
        var isInvoice = false;
        var isi = "";
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        })
        function invoice(){
            if(isInvoice){
                $("#screen1").css("display","none");
                $("#screen2").css("display","block");
                isi = "<div>";
                pesanan.forEach(fungsi);
                isi += "</div>";
                $("#list").html(isi);
                $("#total").html("Total : "+formatter.format(total_harga));

                isInvoice = false;
            }else{
                $("#screen1").css("display","block");
                $("#screen2").css("display","none");
                isInvoice = true;

            }
        }
        function fungsi(value){
            var list = "";
            list = "<div class='list-menu'>";
            list += "<div class='row'>";
            list+= "<div class='col-1'><span class='text-qty'>"+value.qty+"</span></div>";
            list+= "<div class='col-6'><span class='text-nama'>"+value.nama+"</span></div>";
            list+= "<div class='col-5'><span class='text-harga'>"+formatter.format(value.harga)+"</span></div>";
            list += "</div>";
            list += "</div>";
            isi+= list;

        }
        function tambahMenu(id,nama,harga){

            total++;
            total_harga = total_harga + harga;
            if(total > 0){
                $("#total_detail").html("Lihat Detail ("+total+")");
                $("#total_harga").html(formatter.format(total_harga));
            }
            var jml = Number($("#jml-"+id).html());
            jml+=1
            $("#jml-"+id).html(jml)
            if(jml > 0){
                $("#tambah-menu-"+id).css("display","block");
            }else{
                $("#tambah-menu-"+id).css("display","none");
            }
            var menu = {nama:nama,harga:harga,qty:jml};
            pesanan[id] = menu;
        }
        function kurangMenu(id,nama,harga){
            total = total - 2;
            total_harga = total_harga - (harga+ harga);
            if(total > 0){
                $("#total_detail").html("Lihat Detail ("+total+")");
                $("#total_harga").html(formatter.format(total_harga));
            }else{
                $("#total_detail").html("Lihat Detail");
                $("#total_harga").html(formatter.format(0));
                
            }
            var jml = Number($("#jml-"+id).html());
            jml-=2
            $("#jml-"+id).html(jml)
            if(jml > 0){
                $("#tambah-menu-"+id).css("display","block");
            }else{
                $("#tambah-menu-"+id).css("display","none");
            }
            var menu = {nama:nama,harga:harga,qty:jml};
            pesanan[id] = menu;
        }
    </script>

  </body>
</html>

