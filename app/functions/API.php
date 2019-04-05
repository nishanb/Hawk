<?php
	$host='https://apis.paralleldots.com/v4/';

	//function to make http call
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
	//function to check weather text is abusive
	function abuse($text){
		$result=json_decode(getResult('abuse',$text));
		$tags=[];
		$content=0;

		try{
			if($result[0]->confidence_score>$result[1]->confidence_score){
				$content=1;
			}
			else
			{
				$content=0;
			}
		}
		catch(exception $e){
			$content=0;
			foreach ($result[1]->Abuse as $tag) {
				array_push($tags,$tag->tag);
			}
		}
		finally{
			return json_encode(['type'=>$content,'tags'=>$tags]);
		}
	}
	//function to get sentiment pos,neg,neutral for a post
	function sentiment($text){
		$result=getResult('sentiment',$text);

		$sentiment=json_decode($result);
		$sentimentType=max($sentiment->sentiment->positive,
		$sentiment->sentiment->negative,
		$sentiment->sentiment->neutral);

		//positive 1,negative 0, neutral 2
		if($sentimentType==$sentiment->sentiment->positive)
			$sentimentType=1;
		elseif($sentimentType==$sentiment->sentiment->negative)
			$sentimentType=0;
		else
			$sentimentType=2;

		$sentiment->type=$sentimentType;

		return json_encode($sentiment);
	}
	//function to get diffrent emotions about sentence
	function emotion($text){
		$result=getResult('emotion',$text);
		return $result;
	}

?>
