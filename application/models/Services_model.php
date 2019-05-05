<?php
class Services_model extends CI_Model {

	//Model nggo njupuk data seko api server

	private $api_url;

	public function __construct(){
    	$this->api_url = $this->config->item('api_url');
    }

    public function loginUser($data){
        return $this->getAPI("POST","login",$data);
    }

    public function getMasterMenu(){
        return $this->getAPI("GET","mastermenu");
    }

    public function getAllCabang(){
        return $this->getAPI("GET","cabang");
    }
    public function getCabang($id){
        return $this->getAPI("GET","cabang/".$id);
    }
    public function editCabang($id,$body){
        return $this->getAPI("POST","cabang/".$id,$body);
    }
    public function addCabang($body){
        return $this->getAPI("POST","cabang",$body);
    }
    public function deleteCabang($id){
        return $this->getAPI("DELETE","cabang/".$id);
    }


    public function getAllUser(){
        return $this->getAPI("GET","users");
    }

// MASTER MENU
    public function addMenu($body){
        return $this->getAPI("POST","mastermenu",$body);
    }
    public function editMenu($id,$body){
        return $this->getAPI("POST","mastermenu/".$id,$body);
    }
    public function getMenu($id){
        return $this->getAPI("GET","mastermenu/".$id);
    }

    public function getAPI($method,$url,$body = null){

        $url = $this->api_url.$url;
        $request_headers = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        $data = curl_exec($ch);

        if (curl_errno($ch))
        {
            print "Error: " . curl_error($ch);
        }
        else
        {
            $transaction = json_decode($data, TRUE);
            curl_close($ch);
            return $transaction;
        }
    }
}