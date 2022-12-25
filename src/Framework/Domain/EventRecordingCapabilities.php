<?php

namespace App\Framework\Domain;
trait EventRecordingCapabilities
{

    /** @var object[] */
    private $events = [];

    protected function record(object $event):void
    {
        $this->events[]=$event;
    }

    public function releaseEvents():array
    {
        $events = $this->events;
        $this->events = [];
        return  $events;
    }


}