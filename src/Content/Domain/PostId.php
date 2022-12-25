<?php

namespace App\Content\Domain;

use App\Framework\Domain\UUID;

final class PostId extends UUID
{
    public static function fromString(string $value):PostId
    {
        return new self($value);
    }
}