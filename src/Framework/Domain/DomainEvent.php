<?php

namespace App\Framework\Domain;
interface DomainEvent
{
    public function payload():array;
}