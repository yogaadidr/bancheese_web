<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_controller {

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
		$data['menu']="dashboard";
		$this->loadView('dashboard/home',$data);
	}

}
