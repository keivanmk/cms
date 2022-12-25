<?php

namespace App\Content\Application;
use App\Content\Domain\Events\PostPublished;
use App\Framework\Application\Event\EventHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

final class NotifyNewsLetterSubscribers implements EventHandler
{
    public function __invoke(PostPublished $postPublished):void
    {

    }
}