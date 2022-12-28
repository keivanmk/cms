<?php

namespace App\OutBox\Contracts;
use App\Framework\Domain\DomainEvent;

interface EventStore
{

    /**
     * @param array<DomainEvent> $domainEvent
     * @return void
     */
    public function add(array $domainEvent):void;

}