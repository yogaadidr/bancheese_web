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
</style>
</head>



  <body>


    <div class="row no-gutters min-h-fullscreen bg-white">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header " style="text-alignment:center">Daftar Menu</div>
                <div class="card-body">
                    <?php
                        foreach($list as $list): ?>
                        <div class="row">
                            <div class="col"><span class="text-nama"><?= $list['NAMA_MENU'] ?></span></div>
                            <div class="col">
                            <span class="text-harga"><?= $list['HARGA'] ?></span></div>
                        </div>    
                    <?php endforeach;
                    ?>


                </div>
            </div>
        </div>
        
    </div>




    <!-- Scripts -->
    <script src="<?= base_url() ?>assets/theadmin/assets/js/core.min.js"></script>
    <script src="<?= base_url() ?>assets/theadmin/assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/theadmin/assets/js/script.min.js"></script>

  </body>
</html>

