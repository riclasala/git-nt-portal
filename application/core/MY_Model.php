<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	
	class My_Model extends CI_Model{

		function __construct(){
			$this->load->model('distributor');
			$this->load->model('api_model');
		}
		/********** Transaction From Mysql **********/
		protected function insert_data($table_name, $data){
			$query = $this->db->set($data)->insert($table_name);
			return $query;
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
		protected function update_data($table_name,$condition,$data){
			$this->db->where($condition);
			$query = $this->db->update($table_name,$data);
			return $query;
		}

		public function setSession($data){
			$this->session->set_userdata($data);
		}

		/********** Transaction From Api **********/		
		public function retrieve_data_api($user_id, $url){
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

		protected function portalDataApi($data){
			return array(
				'user_id' => $data['distributor_id'],
				'username' => $data['username'],
				'password' => $data['password'],
				'type' => $data['type'],
				'disabled' => $data['disabled'],
				'distributor_id' => $data['distributor_id'],
				'temporary' => 0
			);
		}

		protected function distributorDataApi($data){
			return array(
				"distributor_id" => $data['distributor_id'],
			    "distributor_code" => $data['distributor_code'],
			    "last_name" => $data['last_name'],
			    "first_name" => $data['first_name'],
			    "middle_name" => $data['middle_name'],
			    "nickname" => $data['nickname'],
			    "date_joined" => $data['date_joined'],
			    "distributor_address" => $data['distributor_address'],
			    "location_id" => $data['location_id'],
			    "email" => $data['email'],
			    "distributor_level_id" => $data['distributor_level_id'],
			    "birthdate" => $data['birthdate'],
			    "residence_telephone" => $data['residence_telephone'],
			    "office_telephone" => $data['office_telephone'],
			    "mobile_number" => $data['mobile_number'],
			    "tin" => $data['tin'],
			    "subteam_id" => $data['subteam_id'],
			    "sponsor_id" => $data['sponsor_id'],
			    "mobile_number2" => $data['mobile_number2']
			);
		}
	}