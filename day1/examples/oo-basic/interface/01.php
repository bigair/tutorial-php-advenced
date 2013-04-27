<?php
interface Viewable
{
    public function lookLike();
}

interface Eatable
{
    public function tasteLike();
}

class Apple implements Viewable, Eatable
{
    public function lookLike()
    {

    }

    public function tasteLike()
    {

    }
}