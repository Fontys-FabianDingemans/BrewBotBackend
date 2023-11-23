<?php

namespace App\Providers;

use App\Events\NewMessage;
use App\Listeners\NewMessageListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        Event::listen(
            NewMessage::class,
            [NewMessageListener::class, 'handle']
        );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
