<?php

abstract class Db
{
    protected $_dbType;

    public function query($sql)
    {
    }

    public function getType()
    {
        return $this->_dbType;
    }
}

class Db_Mysql extends Db
{
    public function query($sql)
    {
        mysql_query($sql);
    }
}

class Mysql
{
    public function limit($count)
    {

    }
}

class Db_Sqlite extends Db
{

}

class DbTable
{
    protected $_db;

    public function __construct(Db $db)
    {
        $this->_db = $db;
    }

    public fucntion info()
    {
        $this->_db->limit();

    }

    public function insert($data)
    {
        if ('mysql' === $this->_db->getType()) {
            (new Mysql())->limit();
        }

        // insert $data;
    }
}

$db = new Db_Mysql();
$dbTable = new DbTable($db);

class DbRow
{
    protected $_dbTable;

    protected $_data;

    public function __construct(DbTable $dbTable)
    {
        $this->_dbTable = $dbTable;
    }

    public function save()
    {
        // $this->_db->query('INSERT ....');
        $this->_dbTable->insert($data);
    }
}

class Pager
{
    public function setTotal($total)
    {

    }
}


class Person
{
    protected $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function changeName($name)
    {
        if ($name !== $this->_name) {
            $this->_name = $name;
        }
    }

    public function getArticlesByDateRange($start, $end)
    {
        $sql = '..........';
        $this->_query($sql);
    }

    public function getName()
    {
        return $this->_name;
    }

    protected function _query($sql)
    {
        $db = new Db_Mysql();
        $db->query($sql);
    }
}



$person = new Person();
$articles = $person->getArticlesByDateRange('2012', '2013');























