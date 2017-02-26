<?php
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
if (!is_null($events['ref'])) {
    echo "Ref";
}
echo "OK";