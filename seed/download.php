<?php

// Download Script
$curl = curl_init();

$apiKey = "Rf62TqkVxFqtuOAdPUN7ijLK5KRiTntpnrXHv3jg";
$totalFiles = ceil(8489/150);

for ($i = 0; $i < 8489; $i += 150) {
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.nal.usda.gov/ndb/nutrients/?format=json&api_key=$apiKey&nutrients=205&nutrients=204&nutrients=208&nutrients=269&offset=$i",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	));

	$response = curl_exec($curl);

	file_put_contents("usda".($i/150+1).".json", $response);

	$err = curl_error($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	}

	echo "Downloaded USDA file " . ($i/150+1) . "/" . $totalFiles . "\n";
}

curl_close($curl);