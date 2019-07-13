<?php

	class Distributor_model extends MY_Model{
		function __construct(){
			parent::__construct();
		}
		function getInfo($distributor_id){
			$_distributor = new $this->distributor($distributor_id);
			//$_distributor->setLastName('Cabilan');
			//$_distributor->update();

			return array(
				'last_name' => $_distributor->getLastName(),
				'first_name'	=> $_distributor->getFirstName(),
				'id'	=> $_distributor->getId()
			);
			
		}
		function check_user($user){
			$condition = array('distributor_code' => $user);
			$distributor = parent::retrieve_data('distributors',$condition);
			return $this->getInfo($distributor->distributor_id);
		}
		function getDistributorId(){
			return $this->distributor->id;
		}
	}
?>