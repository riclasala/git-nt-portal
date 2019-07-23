<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Report extends My_Controller {
		
		public function __construct(){
			parent::__construct('report');
		}

		public function index(){
			parent::display('home');
		}
		public function genealogy(){
			$data['genealogy'] = $this->api_model->getGenealogyApi($this->session->user_id);
			parent::display('genealogy',$data);
		}

		public function soa(){
			parent::display('soa');
		}
		
	}
?>