<?php

namespace Osen\Subscriptions\Facades;

use Illuminate\Support\Facades\Facade;
use Osen\Subscriptions\Models\SubscriptionPlan;

class Subscribe extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'subscribe';
    }

    public static function routes()
    {
        return app('subscribe')->routes();
    }

    public static function plan($plan)
    {
        return app('subscribe')->plan($plan);
    }

    function to(SubscriptionPlan $plan, $user, $count = 1, $trialDays = 0)
    {
        return $this;
    }
}