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

	public function edit($id, $action = null){
		if($id == null){
			redirect('menu');
		}
		$menu = $this->services_model->getMenu($id);

		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"ubah");
		}
		$data['opt'] = "Ubah";
		$data['menu']= "menu";
		$data['link']= base_url()."menu/edit/".$id."/simpan";
		if($menu['CODE'] == 200){
			$data['list'] = $menu['DATA'];
			$this->loadView('dashboard/menu/form_menu',$data);	
		}else{
			$this->loadView('template/error_500',$data);	
		}
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
			"nama_menu"=>$i->post("NAMA_MENU"),
			"harga"=>$i->post("HARGA"),
			"status"=>$i->post("STATUS")
		);
		if($type == "tambah"){
			$this->services_model->addMenu($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah cabang</div>");
			redirect("menu");
		}else{
			$this->services_model->editMenu($i->post("ID_MENU"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data cabang telah diubah</div>");
			redirect("menu/edit/".$i->post("ID_MENU"));
		}
	}

	public function hapus(){
		$id = $this->input->post("id_hapus");
		$cek = $this->services_model->deleteMenu($id);

		if ($cek['CODE'] == 200) {
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		}else{
			$this->session->set_flashdata("status","<div class='alert alert-danger'>Gagal menghapus,Data telah digunakan untuk transaksi</div>");
		}
		redirect("menu");

	}

}
