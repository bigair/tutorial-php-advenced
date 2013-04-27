<?php
class A
{
    public function __call($name, $args)
    {
        var_dump($name, $args);
    }
}

$category = new Category();
$category->fetch('articles', 'jaceju');
