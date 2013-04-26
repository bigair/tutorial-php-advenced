<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', "username", "password");
    $sql = 'SELECT * FROM users';
    foreach($dbh->query($sql) as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
}