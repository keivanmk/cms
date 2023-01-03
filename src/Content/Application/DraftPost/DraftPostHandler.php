<?php

namespace App\Content\Application\DraftPost;

use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Framework\Application\Event\EventBus;
use App\Content\Domain\PostRepositoryInterface;
use App\Framework\Application\Command\CommandHandler;

final class DraftPostHandler implements CommandHandler
{
    public function __construct(
        private readonly PostRepositoryInterface  $postRepository,
        private readonly EventBus $eventBus,
    )
    {
    }

    public function __invoke(DraftPostCommand $request): void
    {
        $post = Post::draft(PostId::nextId(),$request->title(), $request->content());
        $this->postRepository->add($post);
        $this->eventBus->notifyAll($post->releaseEvents());

    }
}