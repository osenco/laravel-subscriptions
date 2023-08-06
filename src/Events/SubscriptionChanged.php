<?php

namespace Osen\Subscriptions\Event;

use Illuminate\Queue\SerializesModels;
use Osen\Subscriptions\Models\SubscriptionPlan;

class SubscriptionChanged
{
    use SerializesModels;

    public function __construct(public $user, SubscriptionPlan $plan)
    {
    }
}