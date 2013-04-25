<?php

$link = @mysql_connect('localhost', 'username', 'password');

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully';

// make foo the current db
$db_selected = mysql_select_db('test', $link);
if (!$db_selected) {
    die('Can\'t use test : ' . mysql_error($link));
}

$result = mysql_query('SELECT * FROM users WHERE 1 = 1', $link);
if (!$result) {
    die('Invalid query: ' . mysql_error($link));
}

mysql_close($link);