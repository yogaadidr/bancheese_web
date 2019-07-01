<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BaseController {
	private $bulan;

	function __construct(){
		parent::__construct();
		$this->load->model('services_model');
		if($this->session->userdata("userdataLogin") == null){
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan login terlebih dahulu</div>');
			redirect('login');
		}

		$this->bulan = array(
			["bulan" => 'Januari' ,"id" => '01' ],
			["bulan" => 'Februari' ,"id" => '02' ],
			["bulan" => 'Maret' ,"id" => '03' ],
			["bulan" => 'April' ,"id" => '04' ],
			["bulan" => 'Mei' ,"id" => '05' ],
			["bulan" => 'Juni' ,"id" => '06' ],
			["bulan" => 'Juli' ,"id" => '07' ],
			["bulan" => 'Agustus' ,"id" => '08' ],
			["bulan" => 'September' ,"id" => '09' ],
			["bulan" => 'Oktober' ,"id" => '10' ],
			["bulan" => 'November' ,"id" => '11' ],
			["bulan" => 'Desember' ,"id" => '12' ]
		);
	}

	public function index()
	{
		$this->Trend();
	}

	public function Trend($report = "loadTrendDaily")
	{
		$get_periode =  $this->input->get("periode");
		$get_periode =  ($get_periode!='')?$get_periode:'Daily';
		$get_cabang =  $this->input->get("cabang");
		$get_bulan =  $this->input->get("bulan");
		$get_tahun =  $this->input->get("tahun");

		$data['menu']="dashboard";
		$data['master_bulan']= $this->bulan;
		$data['master_tahun'] = $this->services_model->getTahunTransaksi()['DATA'];
		$data['master_cabang'] = $this->services_model->getAllCabang()["DATA"];


		$data['load_trend']="loadTrend".$get_periode."();";
		$data['cabang']=$get_cabang;
		$data['bulan']=($get_bulan!='')?$get_bulan:date('m');
		$data['tahun']=($get_tahun!='')?$get_tahun:date('Y');
		$data['periode']=$get_periode;

		if ($data['periode'] == 'Monthly') {
			$data['detail_penjualan'] = $this->services_model->getTransaksi($data['cabang'],$data['periode'],$data['tahun'])['DATA'];
		}else if ($data['periode'] == 'Yearly') {
			$data['detail_penjualan'] = $this->services_model->getTransaksi($data['cabang'],$data['periode'])['DATA'];
		}else{
			$data['detail_penjualan'] = $this->services_model->getTransaksi($data['cabang'],$data['periode'],$data['tahun'],$data['bulan'])['DATA'];
		}
		$this->loadView('dashboard/home/home.php',$data);
	}

	public function detailDashboard($tgl,$periode,$cabang='all'){
		$data['menu']="dashboard";

		if (strlen($tgl)==8) {
			$setTgl=$tgl;
			$format = "d F Y";
		}elseif (strlen($tgl)==6) {
			$setTgl = $tgl.'01';
			$format = "F Y";
		}else{
			$setTgl = $tgl.'0101';
			$format = "Y";
		}
		
		$data['cabang'] = ($cabang!='all')?$this->services_model->getCabang($cabang)['DATA']['NAMA_CABANG']:'All Cabang';
		$data['tanggal'] = date_format(date_create($setTgl),$format);
		$data['sub_menu']="dashboard_detail";
		$data['t_detail']=$this->services_model->getDetailDashboard($tgl,$periode,$cabang)['DATA'];
		// var_dump($data['t_detail']);
		$this->loadView('dashboard/home/detail_dashboard.php',$data);
	}

}
