<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends BaseController {

	function __construct(){
		parent::__construct();
		$this->load->model('services_model');
		if($this->session->userdata("userdataLogin") == null){
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan login terlebih dahulu</div>');
			redirect('login');
		}
	}

	function index(){
		$this->laporanGlobal();
	}

	function laporanGlobal($get_cabang=''){
		$data['cabang']=$get_cabang;
		$data['menu']= "laporan";
		$data['master_cabang'] = $this->services_model->getAllCabang()["DATA"];
		$data['cabang']=$get_cabang;

		$data['saldo_total'] = $this->services_model->getSaldoGudang($get_cabang)["DATA"];

		
		$this->loadView('dashboard/laporan/kelola_laporan',$data);
	}

	function laporanDetailBulan($get_cabang){
		$data['menu']= "laporan";
		$data['bahan'] = $this->input->get("bahan");
		$data['master_cabang'] = $this->services_model->getAllCabang()["DATA"];
		$data['cabang']=$get_cabang;
		$data['link_modal'] = base_url()."Laporan/laporanDetailHari/$get_cabang/".$data['bahan'].'/';

		$data['saldo_bulan'] = $this->services_model->getSaldoGudang($get_cabang,$data['bahan'])["DATA"];
		$this->loadView('dashboard/laporan/kelola_laporan_detail_bulan',$data);
	}

	function laporanDetailHari($get_cabang,$bahan,$tgl_transaksi){
		$data['bahan']= urldecode($bahan);
		$data['saldo_hari'] = $this->services_model->getSaldoGudang($get_cabang,urldecode($bahan),$tgl_transaksi)['DATA'];
		$this->load->view('dashboard/laporan/kelola_laporan_detail_hari',$data);
	}
}