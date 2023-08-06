<?php

namespace Osen\Subscriptions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class SubscriptionPlan extends Model
{
    protected $guarded = [];

    function sharedUpTo(int $count) {

    }

    function openlySharedUpTo(int $count) {

    }

    public function features()
    {
        return $this->hasMany(SubscriptionFeature::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    function subscribers(): HasManyThrough
    {
        return $this->hasManyThrough(config('subscriptions.user_model'), Subscription::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}