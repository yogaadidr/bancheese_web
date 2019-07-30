<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends BaseController {

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
		$data['menu']= "kategori";
		$data['list'] = $this->services_model->getAllKategori()["DATA"];
		$this->loadView('dashboard/kategori/kelola_kategori',$data);
	}

	public function edit($id, $action = null){
		if($id == null){
			redirect('kategori');
		}
		$kategori = $this->services_model->getKategori($id);

		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"ubah");
		}
		$data['opt'] = "Ubah";
		$data['menu']= "kategori";
		$data['link']= base_url()."kategori/edit/".$id."/simpan";

		$data['kategori'] = $this->services_model->getAllKategori()["DATA"];

		if($kategori['CODE'] == 200){
			$data['list'] = $kategori['DATA'];
			$this->loadView('dashboard/kategori/form_kategori',$data);	
		}else{
			$this->loadView('template/error_500',$data);	
		}
	}

	public function tambah($action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"tambah");
		}

		$data['opt'] = "Tambah";
		$data['menu']= "kategori";
		$data['list']= null;
		$data['link']= base_url()."kategori/tambah/simpan";

		$data['kategori'] = $this->services_model->getAllKategori()["DATA"];

		$this->loadView('dashboard/kategori/form_kategori',$data);
	}

	private function modifyData($i, $type){
		$body = array(
			"nama_kategori"=>$i->post("NAMA_KATEGORI"),
			"jenis"=>$i->post("JENIS"),
			"satuan"=>$i->post("SATUAN"),
			"id_kategori"=>$i->post("KATEGORI")
		);
		if($type == "tambah"){
			$this->services_model->addKategori($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah kategori bahan</div>");
			redirect("kategori");
		}else{
			$this->services_model->editKategori($i->post("ID_KATEGORI"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data kategori bahan telah diubah</div>");
			redirect("kategori/edit/".$i->post("ID_KATEGORI"));
		}
	}

	public function hapus(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteKategori($id);

		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect("kategori");

	}

}
