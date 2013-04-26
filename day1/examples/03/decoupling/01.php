<?php

class PageBuilder
{

    public function buildCategory($categoryId)
    {
        $category = new Category($categoryId);
        $category->createFolder();

    }

    public function buildArticle($articleId)
    {
        $article = new Article($articleId);
    }
}

class Category
{
}

class Article
{

}