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
			$result = array("nama"=>"Yoga Adi Dharma");
			$this->session->set_userdata("userdataLogin",$result);
			redirect("dashboard");
		}else{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Username atau password tidak ditemukan</div>');
			redirect("login");
		}
	}

	
}
