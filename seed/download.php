<?php

// Download Script
$curl = curl_init();

$apiKey = "Rf62TqkVxFqtuOAdPUN7ijLK5KRiTntpnrXHv3jg";
$totalFiles = ceil(8489/150);

//Update start # to start on a different page of results
$start = 49*150;

for ($i = $start; $i < 8489; $i += 150) {
	$pageNo = $i/150+1;
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

	$err = curl_error($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	  exit();
	}

	file_put_contents("usda".$pageNo.".json", $response);

	$responses = json_decode($response, true);

	$count = 0;
	$food = $responses['report']['foods'];

	foreach ($food as $foodItem) {
		$count++;
		$id = $foodItem['ndbno'];

		$ch = curl_init();
		curl_setopt_array($ch, array (
			CURLOPT_URL => "https://api.nal.usda.gov/ndb/reports/?ndbno=$id&type=b&format=json&api_key=$apiKey",
			CURLOPT_RETURNTRANSFER => 1
		));

		$response = curl_exec($ch);

		$err = curl_error($ch);

		if ($err) {
			echo "cURL Error: " . $err;
		}

		file_put_contents("measures/" . $pageNo . "-" . $count . ".json", $response);
		curl_close($ch);
	}

	echo "Downloaded USDA file " . ($i/150+1) . "/" . $totalFiles . "\n";
}

curl_close($curl);