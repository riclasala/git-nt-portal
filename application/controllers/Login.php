<?php

class Login extends MY_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		parent::login('login');
	}
	public function logout(){
		_clear_sessions();
		redirect('');
	}
	

	public function getMessage($distributor){
		//return '<br /><div class="alert alert-success" role="alert"><i class="fa fa-check"></i> Happy Day!<b> '. $distributor['first_name'] .' '. $distributor['last_name'] .'</b></div>';
		return 'Happy day! ' . $distributor['first_name'] . ' ' . $distributor['last_name'];
	}

	public function check_user(){
		$user = $this->input->post('username');
		$distributor = $this->distributor_model->check_user($user);
		$message = '';
		if(isset($distributor)){
			$message = $this->getMessage($distributor);
		}
		echo $message;
		
	}

	public function signin(){
		$user = $this->input->post('username');
		$password = $this->input->post('password');
		$distributor = $this->distributor_model->login($user, $password);
		$message = '';
		if(isset($distributor)){
			$distributor_id = $distributor->distributor_id;
		}else{
			$message = '<br /><div class="alert alert-danger" role="alert"><i class="fa fa-times"></i> Incorrect Username / Password.</div>';
		}
		echo $message;
	}
}