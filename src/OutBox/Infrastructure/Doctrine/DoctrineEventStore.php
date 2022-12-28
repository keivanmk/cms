<?php

namespace App\OutBox\Infrastructure\Doctrine;
use App\OutBox\Entity\Event;
use App\OutBox\Entity\EventId;
use App\OutBox\Contracts\EventStore;
use App\Framework\Domain\DomainEvent;
use App\OutBox\Entity\EventRepository;

class DoctrineEventStore implements EventStore
{


    public function __construct(private readonly EventRepository $eventRepository)
    {
    }

    /**
     * @param array $domainEvents
     * @return void
     * @throws \ReflectionException
     */
    public function add(array $domainEvents): void
    {

        foreach ($domainEvents as $domainEvent)
        {
            $event = new Event(
                EventId::nextId(),
                (new \ReflectionClass($domainEvent))->getShortName()
                ,$domainEvent->payload()
            );
            $this->eventRepository->add($event);
        }

    }
}