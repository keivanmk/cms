<?php

namespace App\Content\Domain\Events;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Framework\Domain\DomainEvent;

final class PostPublished implements DomainEvent
{
    private function __construct(
        private readonly string $postId,
        private readonly string $postTitle,
        private readonly string $postContent
    )
    {}

    public static function create(PostId  $postId,string $postTitle,string $postContent):PostPublished
    {
        return new self($postId,$postTitle,$postContent);
    }

    /**
     * @return string
     */
    public function postId(): string
    {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function postTitle(): string
    {
        return $this->postTitle;
    }

    /**
     * @return string
     */
    public function postContent(): string
    {
        return $this->postContent;
    }

}