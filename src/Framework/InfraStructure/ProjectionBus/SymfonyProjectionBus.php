<?php

namespace App\Framework\InfraStructure\ProjectionBus;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Framework\Application\Projection\Projection;
use App\Framework\Application\Projection\ProjectionBus;

final class SymfonyProjectionBus implements ProjectionBus
{

    public function __construct(private readonly MessageBusInterface $projectionBus)
    {
    }

    public function project(Projection $projection):void
    {
        $this->projectionBus->dispatch($projection);
    }
}