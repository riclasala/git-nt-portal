<?php
	class Distributor extends MY_Model{
		private $id;
		private $lastName;
		private $firstName;

		public function __construct($_id = null){
			
			if(!is_null($_id)){
				$this->id = $_id;
				$this->retrieve_distributor_by_id($_id);
			}
		}
		public function setLastName($_lastName){
			$this->lastName = $_lastName;
		}
		public function getLastName(){
			return $this->lastName;
		}
		public function setFirstName($_firstName){
			$this->firstName = $_firstName;
		}
		public function getFirstName(){
			return $this->firstName;
		}
		public function getId(){
			return $this->id;
		}
		public function getInfo($data = null){

			if(!is_null($data)){
				$this->lastName = $data->last_name;
				$this->firstName = $data->first_name;
				
			}else{
				redirect('login');
			}
			
		}

		public function retrieve_distributor_by_id($distributor_id){
			$query = parent::retrieve_data('distributors',array('distributor_id' => $distributor_id));
			return $this->getInfo($query);
		}
		/*public function fetch_distributor($distributor_id)
		{
			$query = $this->db->get_where('distributors', );
			$result = $query->row();
			return $this->getInfo($result);
		}*/
		public function update(){
			//echo $this->getLastName();
		}
	}
?>