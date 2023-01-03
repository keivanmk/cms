<?php

namespace App\OutBox\Handlers;
use App\Framework\Domain\DomainEvent;
use Symfony\Component\Messenger\MessageBusInterface;

class OutBoxEventHandler
{

    public function __construct(private readonly MessageBusInterface $eventBus)
    {
    }

    public function __invoke(DomainEvent $domainEvent):void
    {
        $this->eventBus->dispatch($domainEvent);
    }
}