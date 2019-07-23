<?php

	class Distributor_model extends MY_Model{
		function __construct(){
			parent::__construct();
			
		}
		function getInfo($distributor_id){
			$_distributor = new $this->distributor($distributor_id);
			return $_distributor->getDistributorInfoArray();
		}
		function check_user($user){
			$condition = array('distributor_code' => $user);
			$distributor = parent::retrieve_data('distributors',$condition);
			if(isset($distributor)){
				$distributor_id = $distributor->distributor_id;
				//check if portal is existing in portal_accounts (mysql) if not get data from api
				$portal_exist = parent::retrieve_data('portal_accounts',array('distributor_id'=>$distributor_id));
				if(!$portal_exist){
					$portal_api = $this->api_model->getPortalApi($distributor_id);
					if(!is_null($portal_api['id'])){
						$portal = parent::insert_data('portal_accounts', parent::portalDataApi($portal_api));				
					}
				}
				return $this->getInfo($distributor_id);
			}else{
				$condition = array('username' => $user);
				$portal = parent::retrieve_data('portal_accounts',$condition);
				if(isset($portal)){
					$distributor_id = $portal->distributor_id;
					//check if distributor_id is existing in distributors (myqsl) if not get data from api
					$distributor_exist = parent::retrieve_data('distributors',array('distributor_id'=>$distributor_id));
					if(!$distributor_exist){
						$distributor_api = $this->api_model->getDistributorApi($distributor_id);
						if(!is_null($distributor_api['distributor_id'])){
							$distributor = parent::insert_data('distributors', parent::distributorDataApi($distributor_api));
							
						}
					}
					return $this->getInfo($distributor_id);
				}else{
					/********** This area get data from API and insert in mysql *********/
					$portal_api = $this->api_model->getPortalApi($user);
					if(!is_null($portal_api['id'])){
						$distributor_api = $this->api_model->getDistributorApi($portal_api['distributor_id']);
						if(!is_null($distributor_api['distributor_id'])){
							return $this->insertApiToMySql($portal_api,$distributor_api);
						}
					}else{
						$distributor_api = $this->api_model->getDistributorApi($user);
						if(!is_null($distributor_api['distributor_id'])){
							$portal_api = $this->api_model->getPortalApi($distributor_api['distributor_id']);
							if(!is_null($portal_api['id'])){
								return $this->insertApiToMySql($portal_api,$distributor_api);
							}
						}
					}
					
				}
			}
			return null;
		}
		function insertApiToMySql($portal_api,$distributor_api){
			$portal = parent::insert_data('portal_accounts', parent::portalDataApi($portal_api));
			$distributor = parent::insert_data('distributors', parent::distributorDataApi($distributor_api));
			//check if distributor_id is existing in distributors (mysql) if not proceed to insert
			
			if($portal && $distributor){
				$distributor_id = $distributor_api['distributor_id'];
				return $this->getInfo($distributor_id);
			}else{
				//reverse insert data from api to mysql
			}
			return null;
		}

		function login($user, $password){
			$distcondition = array('distributor_code' => $user);
			$distributor = parent::retrieve_data('distributors',$distcondition);
			$portalcondition = null;
			if(isset($distributor)){
				$distributor_id = $distributor->distributor_id;
				$portalcondition = array('distributor_id' => $distributor_id,'password'=>md5($password));
			}else{
				$portalcondition = array('username' => $user,'password'=>md5($password));	
			}
			return $this->portalCredential($portalcondition);

		}
		private function portalCredential($condition){
			$query = $this->getUserAccount($condition);
			if($query){
				$distributor_id = $query->distributor_id;
				parent::setSession(array('user_id'=>$distributor_id));
				return $query;
			}
			return null;
		}
		private function getUserAccount($condition){
			return parent::retrieve_data('portal_accounts',$condition);
		}

		function getDistributorId(){
			return $this->distributor->getId();
		}
	}
?>