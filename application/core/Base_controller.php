<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}


	public function api_url()
	{
		return $this->config->item('api_url');
	}

	public function loadView($view,$data){

		$data['list_menu'] = $this->initMenu();

		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');

	}

	public function initMenu(){
		$menu1 = array("name"=>"Dashboard","id"=>"dashboard","icon"=>"icon fa fa-home","link"=>"");
		$menu2 = array("name"=>"Kelola Cabang","id"=>"cabang","icon"=>"icon fa fa-sitemap","link"=>"cabang");
		$menu3 = array("name"=>"Kelola Menu","id"=>"menu","icon"=>"icon fa fa-cutlery","link"=>"menu");
		$menu4 = array("name"=>"Kelola User","id"=>"user","icon"=>"icon fa fa-users","link"=>"user");

		return array($menu1,$menu2,$menu3,$menu4);
	}
	
}
