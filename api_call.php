<?php
	$apiData = json_decode(file_get_contents("https://private-627474-nulisec.apiary-mock.com/sales"), true) ;
	$formattedData = array();
	for ($i=0; $i<count($apiData); $i++){
		$formattedTime = date("Y-m-d", strtotime($apiData[$i]['published_at']));
		$datetime = new DateTime($formattedTime);
		$formattedTime = $datetime->format('jS, F Y');
		$formattedData[] = array("dated" => $formattedTime, "cost" => str_replace("$","",$apiData[$i]['sale']));
	}
	echo json_encode($formattedData);
?>