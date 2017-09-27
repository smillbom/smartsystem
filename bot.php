<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = 'u3cfd7005b9df66cb2e83360f22c029e8';
$access_token  = 'OPGo8kMpz7UlLcuayLL9xkIaWu8GnkDIS9sUHRj7h5dpSfeuIaW0muOvw5zBcG/1AIQkVRVJxKYIIPujGMaV2xcdavFKcPICfpAcAORw2By03jUo+bdETZKpg7i2TTzyXPGY92fsfp8FPFokeA+cYAdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
