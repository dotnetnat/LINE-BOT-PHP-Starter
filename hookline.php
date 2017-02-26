<?php
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
if (!is_null($events['ref'])) {
    echo "Ref";
}

$data = [
        'message' = 'ทดสอบ from Gogs'
];
$post = json_encode($data);
$access_token = 'p1Htn19ebepP3RnHCyN4o4z9ngvyhZ7mmY4yLRRub5V';

$url = 'https://notify-api.line.me/api/notify';

$headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;