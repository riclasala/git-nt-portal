<?php
	class Training_model extends MY_Model{
		
		public function retrieve_video_training(){
          	$condition = array('is_display' => 1);
			return parent::retrieve_data('nt_video_training', $condition);
		}
		public function retrieve_pdf_training(){
			$condition = array('is_display' => 1);
			return parent::retrieve_data('nt_pdf_training', $condition);
		}
	
	}
?>