<?php

namespace App\Subscribers\Models;

use App\Events\Models\Post\PostCreated;
use App\Events\Models\Post\PostUpdated;
use App\Events\Models\Post\PostDeleted;
use App\Listeners\SendWelcomeEmail;
use App\Listeners\PostCreatedSendEmail;
use App\Listeners\PostUpdatedSendEmail;
use Illuminate\Events\Dispatcher;

class PostSubscriber
{

    public function subscribe(Dispatcher $events)
    {
        $events->listen(PostCreated::class, PostCreatedSendEmail::class);
        $events->listen(PostUpdated::class, PostUpdatedSendEmail::class);
    }
}
