<?php
$access_token = 'Ij+j9hPnVlxXTEbT18LZlVAPqbjasSrx4iseP/Ww8fw3KcuKVciWKO9JTmvhbXBy5PWD2cTW8J+ENJ1WP2WGJkMuCix7wDFzBKRmbWIyYFcSJr9gw3RZXvNsi5zoxWkKKq1gRPuF9U3l+MtP1DpUwgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
