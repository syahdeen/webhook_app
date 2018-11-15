<?php 
$method = $_SERVER['REQUEST_METHOD'];

//PROSES
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');\
	$json = json_encode($requestBody);
	$text = $json->result->parameters->text;
	
	switch($text){
		case 'hi':
			$speech = "Hi, nice to met you";
			break;
		
		case 'bye':
			$speech = "bye, god night";
			break;
		
		case 'anyting':
			$speech = "yes, you can type anyting here.";
			break;
		
		default:
			$speech = "sorry, I didnt get that. Please cek";
			break;		
	}
	
	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);
}else{
	echo 'method not allowed';
}
?>
