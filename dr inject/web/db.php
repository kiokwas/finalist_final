<?php
$DB_HOST = getenv('DB_HOST') ?: 'db';
$DB_USER = 'root';
$DB_PASS = 'rootpass';
$DB_NAME = 'portal';


$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
die("DB connect failed: " . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
?>
