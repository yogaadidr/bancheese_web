<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends BaseController {

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
		$data['menu']= "download";
		$data['list'] = $this->services_model->getAllApk()["DATA"];
		$this->loadView('dashboard/downloads/kelola_apk',$data);
	}

	public function tambah($action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"tambah");
		}

		$data['opt'] = "Tambah";
		$data['menu']= "download";
		$data['list']= null;
		$data['link']= base_url()."download/tambah/simpan";

		$this->loadView('dashboard/downloads/form_apk',$data);
	}

	public function edit($id, $action = null){
		if($id == null){
			redirect('download');
		}
		$apk = $this->services_model->getApk($id);

		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"ubah");
		}
		$data['opt'] = "Ubah";
		$data['menu']= "download";
		$data['link']= base_url()."download/edit/".$id."/simpan";

		$data['kategori'] = $this->services_model->getAllKategori()["DATA"];

		if($apk['CODE'] == 200){
			$data['list'] = $apk['DATA'];
			$this->loadView('dashboard/download/form_apk',$data);	
		}else{
			$this->loadView('template/error_500',$data);	
		}
	}

	private function modifyData($i, $type){
		$body = array(
			"major"=>$i->post("MAJOR"),
			"patch"=>$i->post("PATCH"),
			"minor"=>$i->post("MINOR"),
			"deskripsi"=>$i->post("DESKRIPSI"),
			"link"=>$i->post("LINK")
		);
		if($type == "tambah"){
			$this->services_model->addApk($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah APK</div>");
			redirect("download");
		}else{
			$this->services_model->editApk($i->post("ID_VERSI"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data APK telah diubah</div>");
			redirect("download/edit/".$i->post("ID_VERSI"));
		}
	}

	public function hapus(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteApk($id);

		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect("download");

	}

}
