<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function _ip_url(){
	if(!isset($_SESSION['ip_address'])){
		$prev_ip = '';
	} else {
		$prev_ip = $_SESSION['ip_address'];
	}
	
	$current_ip = $_SERVER['REMOTE_ADDR'];
	$_SESSION['ip_address'] = $current_ip;

	if($prev_ip == $current_ip){
		$server_ip = $_SESSION['server_ip'];
	} else {
		$server_ip = "122.2.48.48:8080";
		$client_ip = _check_ip();
		if($client_ip == '122.2.48.48'){
			$_SESSION['server_ip'] = '192.168.1.157:8080';
		} else {
			$_SESSION['server_ip'] = $server_ip;
		}
	}
	return $_SESSION['server_ip'];
}

function _check_ip(){
	$jsondata = @file_get_contents('http://ipinfo.io');
	if($jsondata === FALSE) {
		$client_ip = "122.2.48.48";
	} else {
		$json = json_decode($jsondata, TRUE);
		$client_ip = $json['ip'];
	}
	return $client_ip;
}