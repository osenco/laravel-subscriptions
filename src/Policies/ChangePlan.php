<?php 

namespace Osen\Subscriptions\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Osen\Subscriptions\Models\SubscriptionPlan;
use Osen\Subscriptions\Models\Subscription;

class ChangePlan
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function upgrade($user, SubscriptionPlan $plan)
    {
        return $user->isSubscribedTo($plan);
    }

    public function downgrade($user, SubscriptionPlan $plan)
    {
        return $user->isSubscribedTo($plan);
    }

    public function cancel($user, Subscription $subscription)
    {
        return $user->isSubscribedTo($subscription->plan);
    }
}