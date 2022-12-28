<?php

namespace App\OutBox\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Entity(repositoryClass: EventRepository::class)]
#[Table(name:'outbox_events')]
class Event
{
    #[Id]
    #[Column(type: Types::GUID)]
    #[GeneratedValue(strategy: "NONE")]
    private string $eventId;
    #[Column(type: Types::STRING)]
    private string $eventName;
    #[Column(type: Types::SIMPLE_ARRAY)]
    private array $eventPayload;
    #[Column(name: 'created_at',type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $createdAt;
    #[Column(type: Types::BOOLEAN)]
    private bool $isProcessed;

    /**
     * @param EventId $eventId
     * @param string $eventName
     * @param array $eventPayload
     */
    public function __construct(EventId $eventId,string $eventName, array $eventPayload)
    {
        $this->eventId = $eventId;
        $this->eventName = $eventName;
        $this->eventPayload = $eventPayload;
        $this->createdAt = \DateTimeImmutable::createFromMutable(new \DateTime());
        $this->isProcessed = false;
    }


    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @return array
     */
    public function getEventPayload(): array
    {
        return $this->eventPayload;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isProcessed(): bool
    {
        return $this->isProcessed;
    }


}