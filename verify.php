<?php
$access_token = 'OPGo8kMpz7UlLcuayLL9xkIaWu8GnkDIS9sUHRj7h5dpSfeuIaW0muOvw5zBcG/1AIQkVRVJxKYIIPujGMaV2xcdavFKcPICfpAcAORw2By03jUo+bdETZKpg7i2TTzyXPGY92fsfp8FPFokeA+cYAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
