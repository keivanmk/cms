<?php

namespace App\Content\Domain;
interface PostRepositoryInterface
{
    public function ofId(PostId $postId):Post;
    public function save(Post $post);
}