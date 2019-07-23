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
			parent::display('genealogy');
		}
		public function retrievegenealogy($distributor_id = null){
			if(is_null($distributor_id)){
				$distributor_id = $this->input->get('distributor_id');
			}
        	$json_array = $this->api_model->getGenealogy($distributor_id);
        	//print_r($json_array);
      
            foreach ($json_array as $info) {
                //if($info['sponsor_id']  == $distributor_id){
                    $result[] = $info;
                //}    
            }
            
        	echo json_encode($result);
		}

		public function soa(){
			parent::display('soa');
		}
		
	}
?>