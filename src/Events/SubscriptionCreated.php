<?php

namespace Osen\Subscriptions\Event;

use Illuminate\Queue\SerializesModels;
use Osen\Subscriptions\Models\SubscriptionPlan;

class SubscriptionCreated
{
    use SerializesModels;

    public function __construct(public $user, SubscriptionPlan $plan)
    {
    }
}