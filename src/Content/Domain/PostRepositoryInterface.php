<?php

namespace App\Content\Domain;
interface PostRepositoryInterface
{
    public function save(Post $post);
}