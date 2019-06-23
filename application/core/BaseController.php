<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

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
		$menu2 = array("name"=>"Laporan Gudang","id"=>"laporan","icon"=>"icon fa fa-file","link"=>"laporan");
		$menu3 = array("name"=>"Kelola Kategori Bahan","id"=>"kategori","icon"=>"icon fa fa-cubes","link"=>"kategori");
		$menu4 = array("name"=>"Kelola Bahan Baku","id"=>"bahan","icon"=>"icon fa fa-cube","link"=>"bahan");
		$menu5 = array("name"=>"Kelola Menu","id"=>"menu","icon"=>"icon fa fa-cutlery","link"=>"menu");
		$menu6 = array("name"=>"Kelola Cabang","id"=>"cabang","icon"=>"icon fa fa-sitemap","link"=>"cabang");
		$menu7 = array("name"=>"Kelola User","id"=>"user","icon"=>"icon fa fa-users","link"=>"user");

		return array($menu1,$menu2,$menu3,$menu4,$menu5,$menu6,$menu7);
	}
	
}
