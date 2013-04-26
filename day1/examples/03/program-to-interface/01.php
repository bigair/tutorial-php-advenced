<?php

$mysqli = new mysqli("localhost", "username", "password", "test");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$sql = 'SELECT * FROM users';
$res = $mysqli->query($sql);
while ($row = $res->fetch_assoc()) {
    print_r($row);
}