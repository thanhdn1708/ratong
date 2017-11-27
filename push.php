<?PHP
	function sendMessage(){
		$content = array(
			"en" => 'The schedule has been generated!'
			);
		
		$fields = array(
			'app_id' => "838c4a64-7f8a-440b-9a33-8af540d04c94",
			'included_segments' => array('All'),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
	    print("\nJSON sent:\n");
	    print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic ZjgzYmY1NDgtN2MzZi00YzM4LTgyYWMtZDkxYTUzMDFiYTFm'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
  	print("\n\nJSON received:\n");
	print($return);
  	print("\n");
?>