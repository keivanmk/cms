<?php

namespace App\Content\Application;
use App\Content\Domain\Events\PostPublished;
use App\Framework\Application\Event\EventHandler;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Framework\Application\Projection\ProjectionBus;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;
use App\Content\Application\HomePagePostsList\HomePagePostProjection;

final class PostPublishedHandler implements EventHandler
{
    public function __construct(private readonly ProjectionBus $bus )
    {
    }
    public function __invoke(PostPublished $postPublished):void
    {
        $this->bus->project(new HomePagePostProjection(
            $postPublished->postId(),
            $postPublished->postTitle(),
            $postPublished->postContent()
        ));
    }
}