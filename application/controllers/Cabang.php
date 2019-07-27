<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends BaseController {

	public $jam;
	public $user;
	function __construct(){
		parent::__construct();
		$this->load->model('services_model');
		if($this->session->userdata("userdataLogin") == null){
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan login terlebih dahulu</div>');
			redirect('login');
		}
		$this->jam = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];

		$this->user = $this->session->userdata("userdataLogin")['id_user'];
	}

	public function index($id = null,$opt = null)
	{
		$data['menu']= "cabang";
		$data['list'] = $this->services_model->getAllCabang()["DATA"];
		$this->loadView('dashboard/cabang/kelola_cabang',$data);	
	}
	public function edit($id, $action = null){
		if($id == null){
			redirect('cabang');
		}
		$cabang = $this->services_model->getCabang($id);

		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"ubah");
		}
		$data['jam'] = $this->jam;
		$data['opt'] = "Ubah";
		$data['menu']= "cabang";
		$data['link']= base_url()."cabang/edit/".$id."/simpan";
		if($cabang['CODE'] == 200){
			$data['list'] = $cabang['DATA'];
			$this->loadView('dashboard/cabang/form_cabang',$data);	
		}else{
			$this->loadView('template/error_500',$data);	
		}
	}

	public function tambah($action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"tambah");
		}
		$data['jam'] = $this->jam;
		$data['opt'] = "Tambah";
		$data['menu']= "cabang";
		$data['list']= null;
		$data['link']= base_url()."cabang/tambah/simpan";
		$this->loadView('dashboard/cabang/form_cabang',$data);	
	}

	private function modifyData($i, $type){
		$body = array(
			"nama_cabang"=>$i->post("NAMA_CABANG"),
			"alamat"=>$i->post("ALAMAT"),
			"no_hp"=>$i->post("NO_HP"),
			"nama_pemilik"=>$i->post("NAMA_PEMILIK"),
			"jam_buka"=>$i->post("JAM_BUKA"),
			"jam_tutup"=>$i->post("JAM_TUTUP"),
			"printer"=>$i->post("PRINTER")
		);
		if($type == "tambah"){
			$this->services_model->addCabang($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah cabang</div>");
			redirect("cabang");
		}else{
			$this->services_model->editCabang($i->post("ID_CABANG"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data cabang telah diubah</div>");
			redirect("cabang/edit/".$i->post("ID_CABANG"));
		}
	}

	public function hapus(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteCabang($id);
		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus, Data cabang telah melakukan transaksi</div>");
		}
		redirect("cabang");

	}

	public function menuCabang($id){
		$data['menu']= "cabang";
		$data['cabang'] = $this->services_model->getCabang($id)['DATA'];
		$data['list'] = $this->services_model->getMenuCabang($id)["DATA"];
		$data['id_cabang'] = $id;
		$this->loadView('dashboard/cabang/kelola_menu_cabang',$data);	
	}

	public function tambahMenuCabang($id_cabang, $action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyDataMenu($this->input,$id_cabang,"tambah");
		}
		$data['menu']= "cabang";
		$data['opt'] = "Tambah";
		$data['id_cabang'] = $id_cabang;
		$data['master_menu'] = $this->services_model->getMasterMenu()["DATA"];
		$data['cabang'] = $this->services_model->getCabang($id_cabang)['DATA'];
		$data['link']= base_url()."cabang/tambahMenuCabang/$id_cabang/simpan";
		$data['list'] = null;
		$this->loadView('dashboard/cabang/form_menu_cabang',$data);		
	}

	public function editMenuCabang($id_menu_detail,$id_cabang, $action = null){
		if($id_menu_detail == null){
			redirect("cabang/menuCabang/".$id_cabang);
		}

		$menu_detail = $this->services_model->getMenuDetail($id_menu_detail);
		if($action != null  && $action == 'simpan'){
			$this->modifyDataMenu($this->input,$id_cabang,"ubah");
		}
		$data['menu']= "cabang";
		$data['opt'] = "Ubah";
		$data['id_cabang'] = $id_cabang;
		$data['master_menu'] = $this->services_model->getMasterMenu()["DATA"];
		$data['cabang'] = $this->services_model->getCabang($id_cabang)['DATA'];
		$data['link']= base_url()."cabang/editMenuCabang/$id_menu_detail/$id_cabang/simpan";
		
		if($menu_detail['CODE'] == 200){
			$data['list'] = $menu_detail['DATA'];
			$this->loadView('dashboard/cabang/form_menu_cabang',$data);		
		}else{
			$this->loadView('template/error_500',$data);	
		}	
	}

	public function hapusMenuCabang(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteMenuDetail($id);
		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function getDetailMenu($id){
		$menu = $this->services_model->getMenu($id)['DATA'];
		echo str_replace('.00', '', $menu['HARGA']);
	}

	public function modifyDataMenu($i, $id_cabang, $type){
		$menu = explode("#",  $i->post("MASTER_MENU"));
		$body = array(
			"id_menu" => $menu[0],
			"id_cabang" => $id_cabang,
			"harga" => ($i->post("HARGA") != '')?$i->post("HARGA"):$i->post("HARGA_MASTER"),
			"nama_menu" => ($i->post("NAMA_MENU") != '')?$i->post("NAMA_MENU"):$menu[1],
			"status" => $i->post("STATUS")
		);
		if($type == "tambah"){
			$this->services_model->addMenuCabang($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah menu cabang</div>");
			redirect("cabang/menuCabang/$id_cabang");
		}else{
			$this->services_model->editMenuCabang($i->post("ID_MENU_DETAIL"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data menu cabang telah diubah</div>");
			redirect("cabang/editMenuCabang/".$i->post("ID_MENU_DETAIL").'/'.$id_cabang);
		}
	}

	public function bahanCabang($id){
		$data['menu']= "cabang";
		$data['cabang'] = $this->services_model->getCabang($id)['DATA'];
		$data['list'] = $this->services_model->getBahanCabang($id)["DATA"];
		$data['id_cabang'] = $id;
		$this->loadView('dashboard/cabang/kelola_bahan_cabang',$data);
	}

	public function tambahBahanCabang($id_cabang, $action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyDataBahan($this->input,$id_cabang,"tambah");
		}
		$data['menu']= "cabang";
		$data['opt'] = "Tambah";
		$data['id_cabang'] = $id_cabang;
		$data['master_bahan'] = $this->services_model->getAllBahan()["DATA"];
		$data['link']= base_url()."cabang/form_bahan_cabang/$id_cabang/simpan";
		$data['list'] = null;
		$this->loadView('dashboard/cabang/form_bahan_cabang',$data);
	}

	public function debetBahanCabang($id_bahan='',$id_cabang='', $action = null){
		if($action != null  && $action == 'debet'){
			$this->modifyDataBahan($this->input,$id_cabang,"debet");
		}
		$harga = round($this->input->get('hrg'));
		$data['menu']= "cabang";
		$data['opt'] = "Debet";
		$data['id_cabang'] = $id_cabang;
		$data['id_bahan'] = $id_bahan;
		$data['link']= base_url()."cabang/debetBahanCabang/$id_bahan/$id_cabang/debet";
		$data['list'] = $this->services_model->getDataDebet($harga,$id_bahan,$id_cabang)['DATA'];
		$this->loadView('dashboard/cabang/form_bahan_cabang',$data);
	}

	public function kreditBahanCabang($id_bahan='',$id_cabang='', $action = null){
		if($action != null  && $action == 'kredit'){
			$this->modifyDataBahan($this->input,$id_cabang,"kredit");
		}
		$harga = round($this->input->get('hrg'));
		$data['menu']= "cabang";
		$data['opt'] = "Kredit";
		$data['id_cabang'] = $id_cabang;
		$data['id_bahan'] = $id_bahan;
		$data['link']= base_url()."cabang/kreditBahanCabang/$id_bahan/$id_cabang/kredit";
		$data['list'] = $this->services_model->getDataKredit($harga,$id_bahan,$id_cabang)['DATA'];

		$this->loadView('dashboard/cabang/form_bahan_cabang',$data);
	}

	public function hapusDebetCabang(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteDebet($id);
		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapusKreditCabang(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteKredit($id);
		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function modifyDataBahan($i, $id_cabang, $type){
		$body = array(
			"id_bahan" => $i->post("ID_BAHAN"),
			"id_cabang" => $i->post("ID_CABANG"),
			"id_user" => $this->user,
			"qty" => $i->post("QTY"),
			"harga" => $i->post("HARGA"),
		);
		if($type == "debet"){
			$this->services_model->debetBahan($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses debet bahan cabang</div>");
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$body["id_debet"] = $i->post("ID_DEBET");
			var_dump($body);
			$this->services_model->kreditBahan($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses kredit bahan cabang</div>");
			redirect("cabang/bahanCabang/$id_cabang");
		}
	}

}
