<?php

namespace Osen\Subscriptions\Event;

use Illuminate\Queue\SerializesModels;
use Osen\Subscriptions\Models\SubscriptionPlan;

class SubscriptionUpgraded
{
    use SerializesModels;

    public function __construct(public $user, SubscriptionPlan $plan, SubscriptionPlan $oldPlan)
    {
    }
}