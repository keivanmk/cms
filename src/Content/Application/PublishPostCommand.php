<?php

namespace App\Content\Application;
use App\Framework\Application\Command\AsyncCommand;

final class PublishPostCommand implements AsyncCommand
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