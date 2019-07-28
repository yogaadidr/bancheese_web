<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends BaseController {

	function __construct(){
		parent::__construct();
		$this->load->model('services_model');
		$this->load->library('session');
	}

	public function getNotif()
	{
		$notif = $this->services_model->getNotif()["DATA"];
		if (!empty($notif)) {
			$data['count_notif'] = count($notif);
			$data['data'] = $notif;
			$i = 0;
			
			foreach ($notif as $key) {
				if ($key['VIEWED']==0) {
					$i++;
				}
			}
			$data['sum_notif'] = $i;
			echo json_encode($data);
		}else{
			$data="empty";
			echo json_encode($data);
		}
	}

	public function updateNotif($id){
		$this->services_model->editNotif($id);
	}

	public function deleteNotif(){
		$this->services_model->deleteNotif();	
	}
	
}
