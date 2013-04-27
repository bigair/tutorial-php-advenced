<?php
$root = new Category('root');
$category = $root->getCategory('test');
$articles = $root->getArticlesFrom($category);