<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends Base_controller {

	public $jam;
	function __construct(){
		parent::__construct();
        $this->load->model('services_model');
        if($this->session->userdata("userdataLogin") == null){
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan login terlebih dahulu</div>');
			redirect('login');
		}
		$this->jam = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];
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
		$this->services_model->deleteCabang($id);
		$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		redirect("cabang");

	}

}
