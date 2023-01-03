<?php

namespace App\Content\Application\PublishPost;
use App\Content\Domain\Post;
use App\Content\Domain\PostId;
use App\OutBox\Contracts\EventStore;
use App\Content\Domain\Events\PostPublished;
use App\Framework\Application\Event\EventBus;
use App\Content\Domain\PostRepositoryInterface;
use App\Framework\Application\Command\CommandHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class PublishPostHandler implements CommandHandler
{

    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
        private readonly EventBus $eventBus,
    )
    {
    }

    public function __invoke(PublishPostCommand $publishPostCommand): void
    {
        $post = $this->postRepository->ofId(PostId::fromString($publishPostCommand->postId()));
        $post->publish();
        $this->postRepository->add($post);
        $this->eventBus->notifyAll($post->releaseEvents());
    }

}