<php
	$access_token = 'hLkOg0z8Bb3Ch0auEZ/7m5/CoX1aFlASR2K4n7uzTDiPNSLASd1QKaAxyb1y8vUVLtghB9VRIfCqmCCn0sCawnCy8ItyNkIGWyEWT5GakNX3voD2oguz4jJWMkckbsLqbV3J1XratjLxjtWmNx0mRAdB04t89/1O/w1cDnyilFU=';

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
