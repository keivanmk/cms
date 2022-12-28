<?php

namespace App\OutBox\Entity;
use App\Framework\Domain\UUID;

final class EventId extends UUID
{
    public static function fromString(string $value):EventId
    {
        return new self($value);
    }
}