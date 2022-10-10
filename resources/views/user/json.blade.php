<?php

$data_string = array();
$curl = curl_init();
$test = http_build_query($data_string);
curl_setopt_array($curl, array(
CURLOPT_URL => 'https://www.datim.org/api/sqlViews/fgUtV6e9YIX/data.json',
CURLOPT_POSTFIELDS => $test,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = json_decode(curl_exec($curl));

curl_close($curl);
print_r($response->listGrid->rows);