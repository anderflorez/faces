<?php
	function face($picture)
	{
		$url = "https://westus.api.cognitive.microsoft.com/face/v1.0/detect";
		$parameters = array('returnFaceId' => 'false', 
					'returnFaceLandmarks' => 'false', 
					'returnFaceAttributes' => 'age,gender');
		$data = "{'url': '$picture'}";
		print_r($data); echo "<br>";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($parameters));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-type: application/json',
			'Ocp-Apim-Subscription-Key: 2f6d02341c2242bba5dda0677920c1ac')
		);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}
?>