<?php

namespace Singleton01;

$app1 = Application::getInstance();
$app2 = Application::getInstance();
$app3 = Application::getInstance();
$app4 = Application::getInstance();

var_dump($app1 === $app2);

$newApp = NewApp::getInstance();

class NewApp extends Application
{

}

class Application
{
    protected $_config = [];
    protected $_appName = 'App';
    private static $_instance = null;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (static::$_instance === null
            || !(static::$_instance instanceof static)) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }

    public function run($filePath)
    {
        $this->_config = Config::factory($filePath);
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

    public static function factory($filePath)
    {
        $ext = pathinfo($filePath)['extension'];
        $className = "\\" . __NAMESPACE__ . "\\Config_" . ucfirst(strtolower($ext));
        if (class_exists($className)) {
            return new $className($filePath);
        } else {
            throw new \Exception("未知的檔案類型");
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
