<?php

namespace App\Framework\InfraStructure\EventBus;
use App\Framework\Domain\DomainEvent;
use App\Framework\Application\Event\EventBus;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyEventBus implements EventBus
{

    public function __construct(private readonly MessageBusInterface $messageBus)
    {
    }

    public function notify(DomainEvent $domainEvent): void
    {
        $this->messageBus->dispatch($domainEvent);
    }

    public function notifyAll(array $domainEvents): void
    {
        array_walk($domainEvents,fn(DomainEvent $domainEvent) => $this->messageBus->dispatch($domainEvent));
    }
}