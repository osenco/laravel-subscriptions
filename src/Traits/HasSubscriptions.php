<?php

namespace Osen\Subscriptions\Traits;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Osen\Subscriptions\Models\Subscription;
use Osen\Subscriptions\Models\SubscriptionPlan;

trait HasSubscriptions
{
    function subscribeTo(SubscriptionPlan $plan, int $count = 1) {}

    function isSubscribedTo(SubscriptionPlan $plan) {}

    function hasActiveSubscription() {
        return $this->subscriptions()->active()->count() > 0;
    }

    function plans(): HasManyThrough {
        return $this->hasManyThrough(SubscriptionPlan::class, Subscription::class);
    }

    function subscription(string $id = null) {
        if ($id) {
            return $this->subscriptions()->where('id', $id)->first();
        }

        return $this->subscriptions()->active()->latest()->first();
    }

    function subsriptions() {
        return $this->hasMany(Subscription::class);
    }
}