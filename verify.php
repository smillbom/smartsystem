<?php
$access_token = '9esOJV5niz1NpIp+LE5AIp2EBtOY5jHm0K5XRrZZSJGO51JtUddMer8xdQGbE5iqAIQkVRVJxKYIIPujGMaV2xcdavFKcPICfpAcAORw2BwGHPU2G10GGsHFB3OXFbz8RnOElniRpywi+w0P2Mad6wdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
