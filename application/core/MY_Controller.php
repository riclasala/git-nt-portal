<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class MY_Controller extends CI_Controller {
		private $_distributor;
		private $folderName;

		public function getDistributor(){
			return $this->_distributor;
		}
		public function __construct($_folderName = null){
			parent::__construct();
			$this->folderName = $_folderName;
			
			$this->load->helper('site_security');
			$this->load->helper('site_settings');
			$this->load->model('distributor');
			$this->load->model('distributor_model');
			$this->load->model('portal_model');
			$this->load->model('api_model');
			
		}
		
		public function index(){
			
		}


		public function display($fileName, $data = null){

			$distributor_id = $this->session->user_id;
			
			if(is_null($distributor_id)){
				$this->load->view('login');
				$this->load->view('layout/modal');
			}else{
				$this->_distributor = $this->distributor_model->getInfo($distributor_id);
				$data['distributor'] = $this->_distributor;

				$data = json_decode(json_encode($data), FALSE);
				$this->load->view('layout/header', $data);
				$this->load->view('layout/modal',$data);
				$this->load->view($this->getFileName($fileName), $data);
				$this->load->view('layout/footer');
			}
			
		}

		public function getFileName($fileName){
			if(!is_null($this->folderName)){
				return $this->folderName . '/' . $fileName;
			}
			return $fileName;
		}


		/*public function distributor_data(){
			$distributor_id = $this->session->user_id;
			$distributor = $this->distributor_model->fetch_distributor($distributor_id);
			$data['distributor'] = $distributor;
			$data['rank'] = $this->distributor_model->fetch_distributor_rank($distributor_id);
			$data['team'] = $this->distributor_model->fetch_team($distributor_id);
			return $data;
		}
		protected function auth_login(){
			$is_logged_in = _check_login();
			if ($is_logged_in == false){
				_clear_sessions();
				redirect('login');
			}
			return true;
		}*/
}