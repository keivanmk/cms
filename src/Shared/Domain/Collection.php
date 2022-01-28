<?php
declare(strict_types=1);

namespace App\Shared\Domain;
use Webmozart\Assert\Assert;

abstract class Collection implements \Countable,\IteratorAggregate
{
    private $items;

    public function __construct(array $items)
    {
        Assert::allIsInstanceOf($items,$this->type());
        $this->items = $items;
    }

    abstract protected function type():string;

    public function getIterator():\ArrayIterator
    {
       return new \ArrayIterator($this->items());
    }

    public function count():int
    {
        return count($this->items);
    }

    public function items():array
    {
        return $this->items;
    }


}