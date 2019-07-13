<?php
	class Portal_model extends CI_Controller{
		private function $username;
		private function $password;

		public function __construct($_username = null){
			if(is_null($_username)){

			}else{
				$this->username = $_username;
			}
		}

		public function get_message(){
			//return 'hello happy day ' . $this->username . '!';
			return 'hello';
		}
	}
?>