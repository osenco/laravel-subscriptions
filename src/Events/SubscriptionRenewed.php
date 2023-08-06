<?php

namespace Osen\Subscriptions\Event;

use Illuminate\Queue\SerializesModels;
use Osen\Subscriptions\Models\SubscriptionPlan;

class SubscriptionRenewed
{
    use SerializesModels;

    public function __construct(public $user, SubscriptionPlan $plan)
    {
    }
}