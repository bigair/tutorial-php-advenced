<?php

namespace SimpleFactory01;

$app = new Application();
echo $app->run('config.ini')->getAppName(), "\n";
echo $app->run('config.json')->getAppName(), "\n";
echo $app->run('config.php')->getAppName(), "\n";
echo $app->run('config.yaml')->getAppName(), "\n";

class Application
{
    protected $_config = [];
    protected $_appName = 'App';

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
        switch ($ext) {
            case 'ini':
                return new Config_Ini($filePath);
                break;
            case 'json':
                return new Config_Json($filePath);
                break;
            case 'php':
                return new Config_Php($filePath);
                break;
            default:
                throw new \Exception("未知的檔案類型");
                break;
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
