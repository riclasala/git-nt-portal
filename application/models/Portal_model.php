<?php

class Portal_model extends MY_Model{

	public function __construct(){
		parent::__construct();
	}
	public function check_user($user){
		$condition = array('username' => $user);
		return parent::retrieve_data('portal_accounts',$condition);
	}
	public function check_unique_username($user){

	}
}