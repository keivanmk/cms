<?php

namespace App\Framework\Application\Projection;
interface ProjectionBus
{
    public function project(Projection $projection):void;
}