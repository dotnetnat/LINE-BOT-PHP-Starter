<?php
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$branch = "";
$commitMessage="";
$projectName="";
if (!is_null($events['ref'])) {
    $branch=$events['ref'];
    $commitMessage=$events['commits'][0]['message'];
    $projectName=$events['repository']['full_name'];
}

var_dump($projectName.$branch.$commitMessage);

define('LINE_API',"https://notify-api.line.me/api/notify");
define('LINE_TOKEN','p1Htn19ebepP3RnHCyN4o4z9ngvyhZ7mmY4yLRRub5V');

function notify_message($message){

    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
            		  ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        )
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $res = json_decode($result);
	return $res;
}

//$res = notify_message('hello from gogs');
//var_dump($res);