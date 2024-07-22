<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
if(!function_exists("tablePrimaryKey")){
	function tablePrimaryKey($tableName,$columnName){
		$data=array('table'=>$tableName,'column'=>$columnName);
		$fields_string = http_build_query($data);
		$curl = curl_init();
		curl_setopt_array($curl,array(
			CURLOPT_URL => 'https://',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>$fields_string
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}