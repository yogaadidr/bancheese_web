<div class="main-content">
  <div class="row" style="position: relative;">


    <div class="col-md-12">
      <div class="card card-body">
        <a href="<?=base_url("cabang")?>"><span class="fa fa-arrow-left"></span> Kembali</a>
        <h3>Kelola Bahan Baku Cabang <?=$cabang['NAMA_CABANG']?></h3>

        <?php
        if($this->session->flashdata("status") != null){
          echo $this->session->flashdata("status");
        }
        ?>
        <br/>
        <div style="margin-bottom: 10px;">
          <a href="<?= base_url()."cabang/tambahBahanCabang/$id_cabang"?>" class="btn btn-success float-right">Debet Bahan Baru <i class="fa fa-plus"></i></a>

        </div>  
        <div class="flexbox">

          <table class="table table-striped table-bordered"cellspacing="0" data-provide="datatables" id="tbl">
            <thead>
              <tr>
                <th width="20">No.</th>
                <th>Nama Bahan</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th >Stok</th>
                <th width="20">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $i = 1;
              if ($list != null) {
                foreach ($list as $list): 
                  $kredit = base_url().'cabang/kreditBahanCabang/'.$list['ID_BAHAN'].'/'.$id_cabang."?nm=".$list['NAMA_BAHAN']."&hrg=".$list['HARGA']."&db=".$list['ID_DEBET']."&stk=".$list['SALDO']; 
                  $debet = base_url().'cabang/debetBahanCabang/'.$list['ID_BAHAN'].'/'.$id_cabang."?nm=".$list['NAMA_BAHAN']."&hrg=".$list['HARGA']."&db=".$list['ID_DEBET']; 
                  ?>
                  <tr>
                    <td><?= $i ?>.</td>
                    <td><?= $list['NAMA_BAHAN']?></td>
                    <td><?= $list['SATUAN']?></td>
                    <td>Rp. <?= number_format($list['HARGA'])?></td>
                    <td><?= $list['SALDO']?></td>
                    <td>
                      <div class="dropdown dropleft">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm no-arrow" data-toggle="dropdown">
                          <span class="fa fa-ellipsis-v"></span>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?= $debet?>">Debet Bahan <i class="fa fa-edit"></i></a>

                          <a class="dropdown-item" href="<?= $kredit ?>">Kredit Bahan <i class="fa fa-edit"></i></a>
                        </div>

                      </div>
                    </td>
                  </tr>
                  <?php $i++; endforeach;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>