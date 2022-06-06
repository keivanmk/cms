<?php

namespace App\Framework\Domain;
class Enum
{
    protected $value;

    private function __construct($value)
    {
        $this->value = $value;
    }

    public static function __callStatic(string $name, array $arguments): Enum
    {
        $constants = self::constants();
        if (isset($constants[$name])) {
            return new static($constants[$name]);
        }
        throw new Exception("{$name} not found");
    }

    protected static function constants(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }

    public static function fromValue($value)
    {
        $flipped_constants = array_flip(self::constants());
        if (isset($flipped_constants[$value])) {
            return new static($value);
        }
        throw new \InvalidArgumentException("{$flipped_constants[$value]} not found");
    }

    public static function fromString($value)
    {
        $constants = self::constants();
        $type = strtoupper($value);
        if (isset($constants[$type])) {
            return new static($constants[$type]);
        }
        throw new \InvalidArgumentException("{$type} not found");
    }

    public function is(Enum $enum): bool
    {
        return get_class($enum) === get_class($this) &&
            $this->value() === $enum->value();
    }

    public function isNot(Enum $enum): bool
    {
        return !$this->is($enum);
    }

    public function value()
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public function key(): string
    {
        $flipped_constants = array_flip(self::constants());
        return strtolower($flipped_constants[$this->value]);
    }

    public function keys(): array
    {
        return array_map('strtoupper', self::constants());
    }
    /**
     * @return static[]
     */
    public static function all(): array
    {
        return array_map(function ($constant) {
            return self::$constant();
        }, array_keys(static::constants()));
    }
}