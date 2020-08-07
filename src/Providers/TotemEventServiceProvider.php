<?php

namespace Wabi\Totem\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class TotemEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        'Wabi\Totem\Events\Created'     => ['Wabi\Totem\Listeners\BustCache'],
        'Wabi\Totem\Events\Updated'     => ['Wabi\Totem\Listeners\BustCache'],
        'Wabi\Totem\Events\Activated'   => ['Wabi\Totem\Listeners\BustCache'],
        'Wabi\Totem\Events\Deactivated' => ['Wabi\Totem\Listeners\BustCache'],
    ];
}
