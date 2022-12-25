<?php

namespace App\Content\Application;

use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\Framework\Application\Event\EventBus;
use App\Content\Domain\PostRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class DraftPostHandler implements MessageHandlerInterface
{
    public function __construct(
        private readonly PostRepositoryInterface  $postRepository,
        private readonly EventBus $eventBus
    )
    {
    }

    public function __invoke(DraftPostCommand $request): void
    {
        $post = Post::draft(PostId::nextId(),$request->title(), $request->content());
        $this->postRepository->save($post);
        $this->eventBus->notifyAll($post->releaseEvents());

    }
}