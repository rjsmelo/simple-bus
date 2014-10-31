<?php

namespace Matthias\SimpleBus\Tests\Event;

use Matthias\SimpleBus\Event\AggregatesMultipleEventProviderCollectors;
use Matthias\SimpleBus\Event\ProvidesEvents;

class AggregatesMultipleEventProviderCollectorsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_collects_event_providers_from_several_other_collectors()
    {
        $eventProvider1 = $this->createDummyEventProvider();
        $eventProvider2 = $this->createDummyEventProvider();

        $aggregator = new AggregatesMultipleEventProviderCollectors(
            array(
                new EventProviderCollectorStub(array($eventProvider1)),
                new EventProviderCollectorStub(array($eventProvider2))
            )
        );

        $this->assertSame(
            array(
                $eventProvider1,
                $eventProvider2
            ),
            $aggregator->collectedEventProviders()
        );
    }

    private function createDummyEventProvider()
    {
        return $this->getMock(ProvidesEvents::class);
    }
}
