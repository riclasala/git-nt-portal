<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Training extends My_Controller {
		
		public function __construct(){
			parent::__construct('training');
			$this->load->model('training_model');
		}

		public function video(){
			$data['videos'] = $this->training_model->retrieve_video_training();
			parent::display('videotraining',$data);
		}
		public function pdf(){
			$data['pdfs'] = $this->training_model->retrieve_pdf_training();
			parent::display('pdftraining',$data);
		}
		

	}
?>