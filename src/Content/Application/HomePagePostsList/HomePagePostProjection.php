<?php

namespace App\Content\Application\HomePagePostsList;
use App\Content\Domain\PostId;
use App\Framework\Application\Projection\Projection;

class HomePagePostProjection implements Projection
{

    public function __construct(
        public readonly string $postId,
        public readonly string $title,
        public readonly string $content
    )
    {
    }
}