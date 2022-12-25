<?php

namespace App\Framework\Application\Event;
use App\Framework\Domain\DomainEvent;

interface EventBus
{
    /**
     * @param DomainEvent $domainEvent
     * @return void
     */
    public function notify(DomainEvent $domainEvent):void;


    /**
     * @param DomainEvent[] $domainEvents
     * @return void
     */
    public function notifyAll(array $domainEvents):void;
}