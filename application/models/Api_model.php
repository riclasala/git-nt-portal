<?php

	class Api_model extends MY_Model{
		private $server_ip;
		function __construct(){
			parent::__construct();
			$this->server_ip = _ip_url();
		}

		public function getPortalApi($user){
			$url = 'http://'.$this->server_ip.'/nutritech_api/portal_account/check_user/'. $user;
			if(is_numeric($user)){
				$url = 'http://'.$this->server_ip.'/nutritech_api/portal_account_dist_id/'. $user;
			}
			$response = parent::retrieve_data_api($user, $url);
			$rows = json_decode($response, TRUE);
			return $rows;
		}

		public function getDistributorApi($user){
			$url = 'http://'.$this->server_ip.'/nutritech_api/distributor_by_code/'. $user;
			if(is_numeric($user)){
				$url = 'http://'.$this->server_ip.'/nutritech_api/distributor_by_id/'. $user;
			}
			$response = parent::retrieve_data_api($user, $url);
			$rows = json_decode($response, TRUE);
			return $rows;
		}

		public function getGenealogyApi($user){
			$url = 'http://'.$this->server_ip.'/nutritech_api/geneology/'.$user;
			$response = $this->retrieve_data_api($user, $url);
			$rows = json_decode($response, TRUE);
			return $rows;
		}
		public function getYearToDate(){

		}

	}
?>