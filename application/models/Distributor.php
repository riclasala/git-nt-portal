<?php
	class Distributor extends MY_Model{

		public function __construct($_distributorId = null){
			
			if(!is_null($_distributorId)){
				$this->setDistributorId($_distributorId);
				$this->retrieve_distributor_data();
			}
		}

		private $distributorId;
		public function getDistributorId(){
			return $this->distributorId;
		}
		public function setDistributorId($_distributorId){
			$this->distributorId = $_distributorId;
		}

		private $distributorCode;
		public function getDistributorCode(){
			return $this->distributorCode;
		}
		public function setDistributorCode($_distributorCode){
			$this->distributorCode->$_distributorCode;
		}

		private $rankId;
		public function getRankId(){
			return $this->rankId;
		}
		public function setRankId($_rankId){
			$this->rankId = $_rankId;
		}

		private $rank;
		public function getRank(){
			return $this->rank;
		}
		public function setRank($_rank){
			$this->rank = $_rank;
		}

		private $teamId;
		public function getTeamId(){
			return $this->teamId;
		}
		public function setTeamId($_teamId){
			$this->$teamId = $_teamId;
		}

		private $subteamId;
		public function getSubteamId(){
			return $this->subteamId;
		}
		public function setSubteamId($_subteamId){
			$this->subteamId = $_subteamId;
		}

		private $locationId;
		public function getLocationId(){
			return $this->locationId;
		}
		public function setLocationId($_locationId){
			$this->locationId = $_locationId;
		}

		private $teamArea;
		public function getTeamArea(){
			return $this->teamArea;
		}
		public function setTeamArea($_teamArea){
			$this->teamArea = $_teamArea;
		}

		private $lastName;
		public function getLastName(){
			return $this->lastName;
		}
		public function setLastName($_lastName){
			$this->lastName = $_lastName;
		}

		private $firstName;
		public function getFirstName(){
			return $this->firstName;
		}
		public function setFirstName($_firstName){
			$this->firstName = $_firstName;
		}

		private $middleName;
		public function getMiddleName(){
			return $this->middleName;
		}
		public function setMiddleName($_middleName){
			$this->middleName = $_middleName;
		}

		public function getFullName(){
			return $this->firstName . ' ' . $this->lastName;
		}
		private $nickName;
		public function getNickName(){
			return $this->nickName;
		}
		public function setNickName($_nickName){
			$this->nickName = $_nickName;
		}

		private $dateJoined;
		public function getDateJoined(){
			return $this->dateJoined;
		}
		public function setDateJoined($_dateJoined){
			$this->dateJoined = $_dateJoined;
		}

		private $address;
		public function getAddress(){
			return $this->address;
		}
		public function setAddress($_address){
			$this->address = $_address;
		}

		private $email;
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($_email){
			$this->email = $_email;
		}

		private $birthDate;
		public function getBirthDate(){
			return $this->birthDate;
		}
		public function setBirthDate($_birthDate){
			$this->birthDate = $_birthDate;
		}

		private $residenceTel;
		public function getResidenceTel(){
			return $this->residenceTel;
		}
		public function setResidenceTel($_residenceTel){
			$this->residenceTel = $_residenceTel;
		}

		private $officeTel;
		public function getOfficeTel(){
			return $this->officeTel;
		}
		public function setOfficeTel($_officeTel){
			$this->officeTel = $_officeTel;
		}

		private $mobileNumber;
		public function getMobileNumber(){
			return $this->mobileNumber;
		}
		public function setMobileNumber($_mobileNumber){
			$this->mobileNumber = $_mobileNumber;
		}

		private $mobileNumber2;
		public function getMobileNumber2(){
			return $this->mobileNumber2;
		}
		public function setMobileNumber2($_mobileNumber2){
			$this->mobileNumber2 = $_mobileNumber2;
		}

		private $tinNumber;
		public function getTinNumber(){
			return $this->tinNumber;
		}
		public function setTinNumber($_TinNumber){
			$this->tinNumber = $_TinNumber;
		}

		private $gender;
		public function getGender(){
			return $this->gender;
		}
		public function setGender($_gender){
			$this->gender = $_gender;
		}

		private $maritalStatus;
		public function getMaritalStatus(){
			return $this->maritalStatus;
		}
		public function setMaritalStatus($_maritalStatus){
			$this->maritalStatus = $_maritalStatus;
		}

		/********** Spouse Detail **********/
		private $spouseLastName;
		public function getSpouseLastName(){
			return $this->spouseLastName;
		}
		public function setSpouseLastName($_sLastName){
			$this->spouseLastName = $_sLastName;
		}

		private $spouseFirstName;
		public function getSpouseFirstName(){
			return $this->spouseFirstName;
		}
		public function setSpouseFirstName($_sFirstName){
			$this->spouseFirstName = $_sFirstName;
		}

		private $spouseMiddleName;
		public function getSpouseMiddleName(){
			return $this->spouseMiddleName;
		}
		public function setSpouseMiddleName($_sMiddleName){
			$this->spouseMiddleName = $_sMiddleName;
		}

		private $spouseMobileNumber;
		public function getSpouseMobileNumber(){
			return $this->spouseMobileNumber;
		}
		public function setSpouseMobileNumber($_sMobileNumber){
			$this->spouseMobileNumber = $_sMobileNumber;
		}

		private $userName;
		public function getUserName(){
			return $this->userName;
		}
		public function setUserName($_userName){
			$this->userName = $_userName;
		}

		private $password;
		public function getPassword(){
			return $this->password;
		}
		public function setPassword($_password){
			$this->password = $_password;
		}
		
		/********** Array **********/
		public function getDistributorInfoArray(){
			return array_merge(
				$this->getDistributorIdArray(),
				$this->getDistributorOtherArray(),
				$this->getDistributorArray(),
				$this->getFullNameArray(),
				//$this->getSpouseArray(),
				$this->getUserNameArray(),
				$this->getPasswordArray()
			);
		}
		public function getDistributorIdArray(){
			return array('distributor_id' => $this->distributorId);
		}
		public function getFullNameArray(){
			return array('fullName'=> $this->getFullName());
		}
		public function getDistributorArray(){
			$distributor_arr = array(
				'distributor_code' => $this->distributorCode,
				'last_name' => $this->lastName,
				'first_name' => $this->firstName,
				'middle_name' => $this->middleName,
				'nickname' => $this->nickName,
				'gender' => $this->gender,
				'marital_status' => $this->maritalStatus,
				'birthdate' => $this->birthDate,
				'mobile_number' => $this->mobileNumber,
				'mobile_number2' => $this->mobileNumber2,
				'distributor_address' => $this->address
			);
			return $distributor_arr;
		}
		public function getDistributorOtherArray(){
			return array('team_area' => $this->teamArea, 'rank' => $this->rank, 'date_joined' => $this->dateJoined);
		}
		public function getSpouseArray(){
			$sponsor_arr =array(
				'spouse_last_name' => $this->spouseLastName,
				'spouse_first_name' => $this->spouseFirstName,
				'spouse_middle_name' => $this->spouseMiddleName,
				'spouse_mobile_number' => $this->spouseMobileNumber 
			);
			return $sponsor_arr;
		}

		public function insertFromApiUserArray(){
			return array_merge(
				$this->getUserNameArray(),
				$this->getPassword(),
				$this->getUserOtherInfoArray()
			);
		}
		public function getUserNameArray(){
			return array('username' => $this->userName);
		}
		public function getPasswordArray(){
			return array('password' => $this->password);
		}

		/********** Update **********/
		public function update_distributor(){
			return parent::update_data('distributors',$this->getDistributorIdArray(),$this->getDistributorArray());
		}
		public function update_spouse_info(){
			return parent::update_data('distributors',$this->getDistributorIdArray(),$this->getSpouseArray());
		}
		public function update_username(){
			return parent::update_data('portal_accounts',$this->getDistributorIdArray(),$this->getUserNameArray());
		}
		public function update_password(){
			return parent::update_data('portal_accounts',$this->getDistributorIdArray(),$this->getPasswordArray());
		}

		/********** Retrieve **********/
		private function retrieve_distributor_data(){
			$_distributorId = $this->distributorId;
			$this->retrieve_distributor();
			$this->retrieve_user_account();
			$this->retrieve_team();
			$this->retrieve_rank();
		}
		private function retrieve_distributor(){
			$query = parent::retrieve_data('distributors',$this->getDistributorIdArray());
			$this->setDistributorInfo($query);
		}
		private function retrieve_user_account(){
			$query = parent::retrieve_data('portal_accounts',$this->getDistributorIdArray());
			$this->setUserAccount($query);
		}
		private function retrieve_team(){
			$subteam_con = array('subteam_id'=> $this->subteamId);
			$location_con = array('location_id' => $this->locationId);
			$subteam_query = parent::retrieve_data('sales_subteam',$subteam_con);
			$team_con = array('team_id'=>$subteam_query->con_id);
			$location_query = parent::retrieve_data('location',$location_con);
			$team_query = parent::retrieve_data('sales_team',$team_con);
			$this->teamArea = strtoupper($subteam_query->subteam_name . ' - ' . $team_query->team_name . ' - ' . $location_query->location);
		}
		private function retrieve_rank(){
			$rank_con = array('id' => $this->rankId);
			$query = parent::retrieve_data('distributor_levels',$rank_con);
			$this->rank = $query->level_description;
		}

		public function setDistributorInfo($data = null){
			if(!is_null($data)){
				$this->distributorCode = $data->distributor_code;
				$this->rankId = $data->distributor_level_id;
				$this->subteamId = $data->subteam_id;
				$this->locationId = $data->location_id;
				$this->lastName = $data->last_name;
				$this->firstName = $data->first_name;
				$this->middleName = $data->middle_name;
				$this->nickName = $data->nickname;
				$this->gender = $data->gender;
				$this->maritalStatus = $data->marital_status;
				$this->dateJoined = $data->date_joined;
				$this->address = $data->distributor_address;
				$this->email = $data->email;
				$this->birthDate = $data->birthdate;
				$this->residenceTel = $data->residence_telephone;
				$this->officeTel = $data->office_telephone;
				$this->mobileNumber = $data->mobile_number;
				$this->mobileNumber2 = $data->mobile_number2;
				$this->tinNumber = $data->tin;
				//$this->spouseLastName = $data->spouse_last_name;
				//$this->spouseFirstName = $data->spouse_first_name;
				//$this->spouseMiddleName = $data->spouse_middle_name;
				//$this->spouseMobileNumber = $data->spouse_mobile_number;
			}
		}

		public function setUserAccount($data = null){
			if(!is_null($data)){
				$this->userName = $data->username;
				$this->password = $data->password;
			}
		}
	}
?>