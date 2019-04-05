<?php
	$host='https://apis.paralleldots.com/v4/';

	function getResult($par,$text){

		$url = 'https://apis.paralleldots.com/v4/'.$par;

		$data = array();
		$data['api_key'] = env('PARALLEL_DOTS_API_KEY');
		$data['text'] = $text;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("content-type: multipart/form-data"));

		$result = curl_exec($ch);
		return $result;
	}

	function abuse($text)
	{
		$result=getResult('abuse',$text);
		return $result;
	}


	function sentiment($text){
		$result=getResult('sentiment',$text);
		return $result;
	}


	function emotion($text){
		$result=getResult('emotion',$text);
		return $result;
	}




?>
