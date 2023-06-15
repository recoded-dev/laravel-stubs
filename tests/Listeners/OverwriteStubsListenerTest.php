<?php

namespace Tests\Listeners;

use Illuminate\Foundation\Events\PublishingStubs;
use Illuminate\Support\Facades\Event;
use Recoded\LaravelStubs\Listeners\OverwriteStubsListener;
use Tests\TestCase;

final class OverwriteStubsListenerTest extends TestCase
{
    /** @covers \Recoded\LaravelStubs\Listeners\OverwriteStubsListener::handle */
    public function test_it_listens(): void
    {
        Event::fake()->assertListening(PublishingStubs::class, OverwriteStubsListener::class);
    }

    /** @covers \Recoded\LaravelStubs\Listeners\OverwriteStubsListener::handle */
    public function test_it_adjusts_the_stubs_property(): void
    {
        $listener = new OverwriteStubsListener();

        $event = new PublishingStubs(['foo-bar' => 'model.stub']);

        $listener->handle($event);

        $path = realpath(__DIR__ . '/../../src/Listeners/../../stubs/model.stub');

        self::assertNotFalse($path);
        self::assertEquals([$path => 'model.stub'], $event->stubs);
    }

    /** @covers \Recoded\LaravelStubs\Listeners\OverwriteStubsListener::handle */
    public function test_it_does_not_change_unknown_stubs(): void
    {
        $listener = new OverwriteStubsListener();

        $event = new PublishingStubs(['foo-bar' => 'foo-bar.stub']);

        $listener->handle($event);

        self::assertEquals(['foo-bar' => 'foo-bar.stub'], $event->stubs);
    }
}
