<?php

namespace Recoded\LaravelStubs\Listeners;

use Illuminate\Foundation\Events\PublishingStubs;
use Illuminate\Support\Collection;

final class OverwriteStubsListener
{
    /**
     * Handle the event.
     *
     * @param \Illuminate\Foundation\Events\PublishingStubs $event
     * @return void
     */
    public function handle(PublishingStubs $event): void
    {
        $event->stubs = Collection::make($event->stubs)->mapWithKeys(function (string $filename, string $path) {
            $localPath = realpath(sprintf('%s/../../stubs/%s', __DIR__, $filename));
            $path = $localPath !== false ? $localPath : $path;

            return [$path => $filename];
        })->toArray();
    }
}
