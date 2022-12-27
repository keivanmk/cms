<?php

namespace App\Content\Application\PublishPost;
use App\Framework\Application\Command\Command;
use App\Framework\Application\Command\AsyncCommand;

final class PublishPostCommand implements Command
{

    public function __construct(
        private string $postId
    )
    {
    }

    public function postId():string
    {
        return  $this->postId;
    }
}