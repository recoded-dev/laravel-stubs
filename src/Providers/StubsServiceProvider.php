<?php

namespace Recoded\LaravelStubs\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Events\PublishingStubs;
use Illuminate\Support\ServiceProvider;
use Recoded\LaravelStubs\Listeners\OverwriteStubsListener;

final class StubsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
     * @return void
     */
    public function boot(Dispatcher $dispatcher): void
    {
        $dispatcher->listen(PublishingStubs::class, OverwriteStubsListener::class);
    }
}
