<?php

class Portal_model extends MY_Model{

	public function __construct(){
		parent::__construct();
	}
	

	public function check_unique_username($user,$distributor_id){
		$condition = array('username' => $user, 'distributor_id !=' => $distributor_id);
		return parent::retrieve_data('portal_accounts',$condition);
	}
}