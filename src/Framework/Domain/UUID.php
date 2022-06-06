<?php

namespace App\Framework\Domain;

abstract class UUID
{

    public function __construct(private string $value)
    {
        $this->validate($this->value);
    }

    public static function generate(): self
    {
        return new static(\Ramsey\Uuid\Uuid::uuid4()->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(UUID $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    private function validate(string $id):void
    {
        if(!\Ramsey\Uuid\Uuid::isValid($id))
        {
            throw new \InvalidArgumentException('<%s> does not allow the value <%s>',static::class,$id);
        }
    }
}