<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends BaseController {

	function __construct(){
		parent::__construct();
		$this->load->model('services_model');
		if($this->session->userdata("userdataLogin") == null){
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan login terlebih dahulu</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['menu']= "bahan";
		$data['list'] = $this->services_model->getAllBahan()["DATA"];
		$this->loadView('dashboard/bahan/kelola_bahan',$data);
	}

	public function edit($id, $action = null){
		if($id == null){
			redirect('bahan');
		}
		$bahan = $this->services_model->getBahan($id);

		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"ubah");
		}
		$data['opt'] = "Ubah";
		$data['menu']= "bahan";
		$data['link']= base_url()."bahan/edit/".$id."/simpan";

		$data['kategori'] = $this->services_model->getAllKategori()["DATA"];

		if($bahan['CODE'] == 200){
			$data['list'] = $bahan['DATA'];
			$this->loadView('dashboard/bahan/form_bahan',$data);	
		}else{
			$this->loadView('template/error_500',$data);	
		}
	}

	public function tambah($action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"tambah");
		}

		$data['opt'] = "Tambah";
		$data['menu']= "bahan";
		$data['list']= null;
		$data['link']= base_url()."bahan/tambah/simpan";

		$data['kategori'] = $this->services_model->getAllKategori()["DATA"];

		$this->loadView('dashboard/bahan/form_bahan',$data);
	}

	private function modifyData($i, $type){
		$body = array(
			"nama_bahan"=>$i->post("NAMA_BAHAN"),
			"satuan"=>$i->post("SATUAN"),
			"id_kategori"=>$i->post("KATEGORI")
		);
		if($type == "tambah"){
			$this->services_model->addBahan($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah bahan baku</div>");
			redirect("bahan");
		}else{
			$this->services_model->editBahan($i->post("ID_BAHAN"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data bahan baku telah diubah</div>");
			redirect("bahan/edit/".$i->post("ID_BAHAN"));
		}
	}

	public function hapus(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteBahan($id);

		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect("bahan");

	}

}
