<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_controller {

	function __construct(){
		parent::__construct();
		$this->load->model('services_model');
		$this->load->library('session');
	}

	public function index()
	{
		$data['menu']= "user";
		$data['list'] = $this->services_model->getAllUser()["DATA"];
		$this->loadView('dashboard/user/kelola_user',$data);
	}

	public function login()
	{
		if($this->session->userdata("userdataLogin") != null){
			redirect('dashboard');
		}
		$this->load->view('login_view');
	}

	public function logout()
	{
		$this->session->unset_userdata("userdataLogin");
		redirect("login");

	}

	public function verification(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$body = array("username"=>$username,"password"=>$password);

		$result = $this->services_model->loginUser($body);
		if($result['CODE'] == 200){
			$result = array("username"=>$result['DATA'][0]["username"]);
			$this->session->set_userdata("userdataLogin",$result);
			redirect(base_url());
		}else{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Username atau password tidak ditemukan</div>');
			redirect("login");
		}
	}

	public function tambah($action = null){
		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"tambah");
		}
		$data['opt'] = "Tambah";
		$data['menu']= "user";
		$data['list']= null;
		$data['link']= base_url()."user/tambah/simpan";

		$data['cabang'] = $this->services_model->getAllCabang()["DATA"];
		$this->loadView('dashboard/user/form_user',$data);	
	}

	public function edit($id, $action = null){
		if($id == null){
			redirect('User');
		}
		$user = $this->services_model->getUser($id);

		if($action != null  && $action == 'simpan'){
			$this->modifyData($this->input,"ubah");
		}
		$data['opt'] = "Ubah";
		$data['menu']= "user";
		$data['link']= base_url()."user/edit/".$id."/simpan";

		$data['cabang'] = $this->services_model->getAllCabang()["DATA"];
		if($user['CODE'] == 200){
			$data['list'] = $user['DATA'];
			$this->loadView('dashboard/user/form_user',$data);	
		}else{
			$this->loadView('template/error_500',$data);	
		}
	}

	private function modifyData($i, $type){
		$body = array(
			"id_cabang"=>$i->post("CABANG"),
			"username"=>$i->post("USERNAME"),
			"password"=>$i->post("PASSWORD"),
			"nama_user"=>$i->post("NAMA"),
			"no_hp"=>$i->post("HP"),
			"alamat"=>$i->post("ALAMAT"),
			"role"=>$i->post("ROLE")
		);
		if($type == "tambah"){
			$this->services_model->addUser($body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Sukses menambah user</div>");
			redirect("user");
		}else{
			$this->services_model->editUser($i->post("ID_USER"),$body);
			$this->session->set_flashdata("status","<div class='alert alert-success'>Data user telah diubah</div>");
			redirect("user/edit/".$i->post("ID_USER"));
		}
	}

	public function hapus(){
		$id = $this->input->post("id_hapus");
		$this->services_model->deleteUser($id);
		$this->session->set_flashdata("status","<div class='alert alert-success'>Data berhasil dihapus</div>");
		redirect("user");

	}

	
}
