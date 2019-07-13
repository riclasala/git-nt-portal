<?php

class Login extends MY_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		parent::login('login');
	}
	public function check_user(){
		$user = $this->input->post('username');
		$portal = $this->portal_model->check_user($user);

		$message = '';

		if(isset($portal)){
			$distributor_id = $portal->user_id;
			$distributor = $this->distributor_model->getInfo($distributor_id);
			$message = $this->getMessage($distributor);
		}else{
			$distributor = $this->distributor_model->check_user($user);
			if(isset($distributor)){
				$message = $this->getMessage($distributor);
			}
		}
		echo $message;
	}
	public function getMessage($distributor){
		return '<br /><div class="alert alert-success" role="alert"><i class="fa fa-check"></i> Happy Day!<b> '. $distributor['first_name'] .' '. $distributor['last_name'] .'</b></div>';
	}

	public function signin(){
		
	}
}