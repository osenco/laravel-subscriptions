<?php

namespace Osen\Subscriptions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Subscription extends Model
{
    protected $table = 'subscription_plan_subscribers';

    protected $guarded = [];

    public function plan()
    {
        return $this->belongsToMany(SubscriptionPlan::class);
    }

    public function subscriber(): MorphTo
    {
        return $this->morphTo('subscriber');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 0);
    }

    public function scopeCancelled($query)
    {
        return $query->whereNotNull('cancelled_at');
    }

    public function scopeNotCancelled($query)
    {
        return $query->whereNull('cancelled_at');
    }

    public function scopeOnTrial($query)
    {
        return $query->where('on_trial', 1);
    }

    public function scopeSoon($query)
    {
        return $query->where('on_trial', 0);
    }
}