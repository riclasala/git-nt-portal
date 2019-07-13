<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	
	class My_Model extends CI_Model{

		function __construct(){
			$this->load->model('distributor');
		}

		public function request_api($user_id, $url){
			$qstring = array('X-API-KEY' => '12345', 'username' => $user_id);
			$query = http_build_query($qstring);
			$ch    = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
			$response = curl_exec($ch);
			curl_close($ch);
			return $response;
		}

		protected function retrieve_data($table_name, $condition = null){
			if(!is_null($condition)){
				$this->db->where($condition); 
			}
			$query = $this->db->get($table_name);

			if($query->num_rows()>1){
				return $query->result();
			}else{
				return $query->row();
			}
		}
		
	}