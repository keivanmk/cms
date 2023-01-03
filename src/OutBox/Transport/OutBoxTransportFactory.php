<?php

namespace App\OutBox\Transport;
use Symfony\Component\Messenger\Transport\TransportInterface;
use Symfony\Component\Messenger\Transport\TransportFactoryInterface;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class OutBoxTransportFactory implements TransportFactoryInterface
{

    public function createTransport(string $dsn, array $options, SerializerInterface $serializer): TransportInterface
    {
        return  new OutBoxTransport();
    }

    public function supports(string $dsn, array $options): bool
    {
        return str_starts_with($dsn, "outbox://");
    }
}