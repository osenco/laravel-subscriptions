<?php

namespace Osen\Subscriptions\Facades;

use Illuminate\Support\Facades\Facade;

class Subscription extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'subscription';
    }

    public static function routes()
    {
        return app('subscription')->routes();
    }

    public static function plan($plan)
    {
        return app('subscription')->plan($plan);
    }
}