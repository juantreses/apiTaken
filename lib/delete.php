<?php

$url = "localhost/phpCityOOPRefactor/api/taken";

$curl = curl_init();
$headers = array();
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($_POST));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);

$result = curl_exec($curl);

curl_close($curl);
header("Location: ../index.php");

if ($result) {
    header("Location: ../index.php");
}
