<?php

namespace App\Framework\Application\Command;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;

final class CommandBus
{

    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    public function dispatch(object $command):Envelope
    {
        try {
            $envelope = $this->commandBus->dispatch($command);
        }catch (HandlerFailedException $exception)
        {
            throw $exception->getNestedExceptions()[0];
        }
        return  $envelope;
    }
}