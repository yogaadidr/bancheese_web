<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Base_controller {

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
		$data['menu']= "menu";
		$data['list'] = $this->services_model->getMasterMenu()["DATA"];
		$this->loadView('dashboard/menu/kelola_menu',$data);
	}

	public function tambah($action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"tambah");
		}
		$data['opt'] = "Tambah";
		$data['menu']= "menu";
		$data['list']= null;
		$data['link']= base_url()."menu/tambah/simpan";

		$this->loadView('dashboard/menu/form_menu',$data);
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
			redirect("cabang".$id);
		}else{
			$this->services_model->editCabang($i->post("ID_CABANG"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data cabang telah diubah</div>");
			redirect("cabang/edit/".$i->post("ID_CABANG"));
		}
	}

}
