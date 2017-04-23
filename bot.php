<?php
$access_token = 'hLkOg0z8Bb3Ch0auEZ/7m5/CoX1aFlASR2K4n7uzTDiPNSLASd1QKaAxyb1y8vUVLtghB9VRIfCqmCCn0sCawnCy8ItyNkIGWyEWT5GakNX3voD2oguz4jJWMkckbsLqbV3J1XratjLxjtWmNx0mRAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data


if (!is_null($events['events'])) {
	// Loop through each event
	$num = 2;$name='';
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$replyToken = $event['replyToken'];
			
			if($text=='เปิดไฟ'){
				
			$messages = [
				'type' => 'text',
				'text' => 'เปิดไฟแล้ว'	
			
			];
				/*$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
				header('https://still-everglades-12727.herokuapp.com/sent.php?messages=$data');*/
			}
			else if($text=='ปิดไฟ'){
			
			$messages = [
				'type' => 'text',
				'text' => 'ปิดไฟแล้ว'
			];		
			
			}else if ($num==0){			
			$num++;
				$name = $text;
			$messages = [
				'type' => 'text',
				'text' => $text.' '.'ชื่อพ่องมึงหรอ'.' '.'เอาชื่อมึง ดิว่ะ'
			];
			}
			else if ($num==1){			
			$num++;
			$messages = [
				'type' => 'text',
				'text' => 'ใช่หรอ'.' '.'กูให้มึงตอบใหม่'
			];
			}
			else if ($num==2){			
			$num++;
			$messages = [
				'type' => 'text',
				'text' => 'กูให้มึงตอบใหม่  '.$name.'  ไม่ใช่ชื่อมึง '.$text.'  ไม่ใช่ชื่อมึง '.'เอาดีๆ'
			];
			}
			else if ($num==3){			
			$num=0;
			$messages = [
				'type' => 'text',
				'text' => 'พอๆ กูลำคาน บล๊อคแม่ง'
			];
			}
			
			
			
			
			
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
