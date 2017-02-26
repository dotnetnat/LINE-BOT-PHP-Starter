<?php
$access_token = 'lNFA6EgKU1Yit4yMXpj6kkPi/HIkT2x3nkJMtI5wp58q9fxvj6IcSkfwmZgdodRQqv+VbK3L1aUvOXAeK4SwEHyFMvhdlt/ZTEvDUTKs9m1s2aIOfLFgw3qeVGgvdqtH+Ov4EQqiQ+JB8HNL47e6jwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;