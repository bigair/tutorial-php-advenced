<?php

namespace Strategy01;

class Application
{
    protected $_config = [];
    protected $_appName = 'App';

    public function run($filePath)
    {
        $this->_config = new Config_Json($filePath);
        $this->_appName = $this->_config->appName;
        return $this;
    }

    public function getAppName()
    {
        return $this->_appName;
    }
}

abstract class Config
{
    protected $_data = [];

    public function __get($name)
    {
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        } else {
            // 丟異常？還是回傳 null ？
            return null;
        }
    }
}

class Config_Json extends Config
{
    public function __construct($filePath)
    {
        $this->_data = (array) json_decode(file_get_contents($filePath));
    }
}

class Config_Ini extends Config
{
    public function __construct($filePath)
    {
        $this->_data = parse_ini_file($filePath);
    }
}

class Config_Php extends Config
{
    public function __construct($filePath)
    {
        $this->_data = include($filePath);
    }
}

$app = new Application();
//echo $app->run('config.ini')->getAppName(), "\n";
//echo $app->run('config.json')->getAppName(), "\n";
//echo $app->run('config.php')->getAppName(), "\n";