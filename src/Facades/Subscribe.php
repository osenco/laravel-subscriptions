<?php

namespace Osen\Subscriptions\Facades;

use Illuminate\Support\Facades\Facade;
use Osen\Subscriptions\Models\SubscriptionPlan;

class Subscribe extends Facade
{
    protected $subscribers = [];

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

    function subscribers($subscribers = [])
    {
        $this->subscribers = $subscribers;
        return $this;
    }

    function subscriber($subscriber)
    {
        $this->subscribers[] = $subscriber;
        return $this;
    }

    function to(SubscriptionPlan $plan, $count = 1, $trialDays = 0)
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->subscribeTo($plan, $count, $trialDays);
        }
        return $this;
    }
}