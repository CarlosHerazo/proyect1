<?php
$login = curl_init(); // iniciar el curl

$httpheaders = ["OGYyMDUzYjI4NTc4MzFlZjQyMmYwYzkzNzkwYzgyMjI6Y2NhZThjNjc1MDVmYTA5MTg0YTgxZGVkM2IzYjBlM2E="];
$url = "https//apify.epayco.co/login";

curl_setopt($login, CURLOPT_URL, $url);
curl_setopt($login, CURLOPT_POST, true);
curl_setopt($login, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($login, CURLOPT_HTTPHEADER, $httpheaders);
$result = curl_exec($login);
curl_close($login);
$token = json_decode($result, true);
var_dump($token);
