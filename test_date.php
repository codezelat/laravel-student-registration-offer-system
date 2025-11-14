<?php
date_default_timezone_set('Asia/Colombo');
$deadline = new DateTime('2025-11-26 23:59:59');
$now = new DateTime();
$interval = $now->diff($deadline);

echo 'Current time (IST): ' . $now->format('Y-m-d H:i:s T') . PHP_EOL;
echo 'Deadline (IST): ' . $deadline->format('Y-m-d H:i:s T') . PHP_EOL;
echo 'Days remaining: ' . $interval->days . PHP_EOL;
echo 'Hours remaining: ' . $interval->h . PHP_EOL;
echo 'Minutes remaining: ' . $interval->i . PHP_EOL;
echo 'Seconds remaining: ' . $interval->s . PHP_EOL;
echo 'Total seconds remaining: ' . ($deadline->getTimestamp() - $now->getTimestamp()) . PHP_EOL;
?>