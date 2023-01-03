<?php

namespace App\Content\Application\HomePagePostsList;
interface HomePagePostsListRepository
{
    public function add(array $post):void;

    public function list():array;
}