<?php

namespace App\Providers;

use App\Events\Models\Post\PostCreated;
use App\Events\Models\Post\PostUpdated;
use App\Events\Models\Post\PostDeleted;
use App\Listeners\SendWelcomeEmail;
use App\Listeners\PostCreatedSendEmail;
use App\Listeners\PostUpdatedSendEmail;
use App\Listeners\PostDeletedSendEmail;
use App\Subscribers\Models\PostCreatedSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //PostCreated::class => [
        //   PostCreatedSendEmail::class,
        //],
        PostUpdated::class => [
            PostUpdatedSendEmail::class,
        ],
        PostDeleted::class => [
            PostDeletedSendEmail::class,
        ],
    ];
    protected $subscribe = [
        PostCreatedSubscriber::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
