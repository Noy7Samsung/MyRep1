<?php
$access_token = 'Ij+j9hPnVlxXTEbT18LZlVAPqbjasSrx4iseP/Ww8fw3KcuKVciWKO9JTmvhbXBy5PWD2cTW8J+ENJ1WP2WGJkMuCix7wDFzBKRmbWIyYFcSJr9gw3RZXvNsi5zoxWkKKq1gRPuF9U3l+MtP1DpUwgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			if ($text == "sticker")
			{
				$messages = [
					'type' => 'sticker',
					'packageId' => '1'
					'stickerId' => '16'
				];
			}else{
				$messages = [
					'type' => 'text',
					'text' => "สวัสดีครับ ID ของคุณคือ".$events['events'][0]['source']['userId']
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
