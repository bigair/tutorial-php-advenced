<?php

namespace FactoryMethod01;

abstract class Db
{
    public function query($sql)
    {}
}

class Mysql extends Db
{
    public function __construct($host, $dbname, $username, $password, $options = [])
    {}
}

class Mssql extends Db
{
    public function __construct($host, $dbname, $appname, $username, $password, $options = [])
    {}
}

class Sqlite extends Db
{
    public function __construct($file, $options = [])
    {}
}

class Postgre extends Db
{
    public function __construct($host, $dbname, $username, $password, $options = [])
    {}
}

$db = new Mysql('localhost', 'dbname', 'username', 'password');
// $db = new Mssql('localhost', 'dbname', 'appname', 'username', 'password');
// $db = new Sqlite('filename.db');
// $db = new Mysql('localhost', 'dbname', 'username', 'password');
$db->query('SELECT * FROM users');
