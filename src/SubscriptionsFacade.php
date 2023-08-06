<?php

namespace Osen\Subscriptions;

use Illuminate\Support\Facades\Facade;

class SubscriptionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'subscriptions';
    }
}