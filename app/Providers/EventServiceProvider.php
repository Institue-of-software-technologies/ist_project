<?php

namespace App\Providers;

use App\Listeners\NotifyUsersListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'App\Events\JobCreated' => [
            NotifyUsersListener::class,
        ],
    ];
}
