<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends My_Controller {
		public function __construct(){
			parent::__construct('profile');
			$this->distributor1 = parent::getDistributor();
			//$this->load->model('report_model');
		}
		public function index(){
			parent::display('profile');
		}
		public function test(){
			$distributor_id = $this->input->post('distributor_id');
			$first_name = $this->input->post('first_name');
			//$distributor = $this->input->post('distributor');
			//$distributor = ($this->distributor()) $this->_distributor;
			//print_r($distributor);
			//echo $this->_distributor;
			//print_r($this->distributor1);
			//print_r($this->distributor1['distributor_id']);
			/*$distributor = parent::$_distributor;
			$distributor->setFirstName($first_name);
			$query = $distributor->update();
			echo $query;*/
			//redirect('profile/index');
		}
		public function update_username(){
			$username = $this->input->post('username');
			$distributor_id = $this->input->post('distributor_id');
			$distributor = new $this->distributor($distributor_id);
			$distributor->setUserName($username);
			$query = $distributor->update_username();
			echo $query;
		}
		public function check_existing($distributor){
			$message = '';
			$username = $this->input->post('username');
			$distributor_id = $this->input->post('distributor_id');
			$query = $this->portal_model->check_unique_username($username,$distributor_id);
			if($query){
				$message = 'exist';
			}
			echo $message;
		}
		public function check_password(){
			$message = '';
			$username = $this->input->post('username');
			$distributor_id = $this->input->post('distributor_id');
			$password = $this->input->post('password');
			$distributor = new $this->distributor($distributor_id);
			if($distributor->getPassword() == md5($password)){
				$message = 'hello';
			}else{
				$message = 'hi';
			}
			echo $message;
		}
	}

?>