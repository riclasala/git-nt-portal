<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function _generate_random_string($length){
	$characters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomstring = '';
	for($i = 0; $i < $length; $i++){
		$randomstring .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomstring;
}

function _check_login(){
	if(!isset($_SESSION['user_id'])){
		return false;
	}

	if(!isset($_SESSION['tmp_user_id'])){
		return false;
	}

	if(!isset($_SESSION['page_type'])){
		return false;
	}

	$page_type = $_SESSION['page_type'];
	if ($page_type != "members") {
		return false;
	}

	return true;
}

function _clear_sessions(){
	session_destroy();
}