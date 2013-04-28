<?php

// Cache System

$cacheKey = 'cache';
if ($backend->has($cacheKey)) {
    return $backend->get($cacheKey);
}

$content = getDbData();
$backend->save($cacheKey, $content);
return $content;

abstract class Backend
{
    public function save($cacheKey, $content)
    {
    }

    public function get($cacheKey)
    {

    }

    public function has($cacheKey)
    {

    }
}

class Backend_File extends Backend
{
    public function save($cacheKey, $content)
    {
        file_put_contents($cacheKey, $content);
    }
}

class Backend_Memcached extends Backend
{
    protected $_memcached

    public function save($cacheKey, $content)
    {
        $this->_memcached->add($cacheKey, $content);
    }
}

abstract class Frontend
{
    protected $_backend = null;

    public function __construct(Backend $backend)
    {
        $this->_backend = $backend;
    }
}

class Frontend_Page extends Frontend
{
    public function save($page)
    {
        $cacheKey = $this->_getUrl();
        $backend->save($cacheKey, $page);
    }
}

// Zend_Cache

class Frontend_Dataset extends Frontend
{
    public function save($dataset)
    {
        $data = serialize($dataset);
        $cacheKey = $dataset->id();
        $backend->save($cacheKey, $data);
    }
}











