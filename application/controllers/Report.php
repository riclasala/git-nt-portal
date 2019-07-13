<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Report extends My_Controller {
		
		public function __construct(){
			parent::__construct('report');
			//$this->load->model('report_model');
		}

		public function index(){
			$distributor_id = $this->distributor->distributor_id;
			print_r($distributor_id);
			parent::display('home');
		}
		public function genealogy(){
			parent::display('genealogy');
		}
		public function soa(){
			parent::display('soa');
		}
		
	}
?>