<?php

namespace Matthias\SimpleBus\Tests\Functional\SmokeTest;

use Matthias\SimpleBus\Event\Event;
use Matthias\SimpleBus\Event\EventHandler;

class SomeOtherEventHandler implements EventHandler
{
    public $eventHandled = false;

    public function handle(Event $event)
    {
        $this->eventHandled = true;
    }
}
