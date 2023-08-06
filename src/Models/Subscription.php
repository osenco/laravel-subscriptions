<?php

namespace Osen\Subscriptions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Subscription extends Model
{
    protected $fillable = [
        'subscriber_id',
        'subscriber_type',
        'subscription_plan_id',
        'starts_at',
        'ends_at',
        'canceled_at',
        'status',
        'trial_ends_at',
        'quantity',
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
        'canceled_at',
        'trial_ends_at',
    ];

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
        return $query->whereNotNull('canceled_at');
    }

    public function scopeNotCancelled($query)
    {
        return $query->whereNull('canceled_at');
    }

    public function scopeOnTrial($query)
    {
        return $query->whereNotNull('trial_ends_at');
    }

    public function scopeSoon($query)
    {
        return $query->whereDate('ends_at', '=<', now()->addDays(7));
    }

    function scopeIsOnGracePeriod($query)
    {
        return $query->whereNotNull('canceled_at')->whereDate('ends_at', '>=', now());
    }

    function renewFor(int $count)
    {
        switch ($this->interval) {
            case 'daily':
                $this->ends_at->addDays($count);
                break;
            case 'days':
                $this->ends_at->addDays($count);
                break;
            case 'weekly':
                $this->ends_at->addWeeks($count);
                break;
            case 'biweekly':
                $this->ends_at->addWeeks(2 * $count);
                break;
            case 'weeks':
                $this->ends_at->addWeeks($count);
                break;
            case 'monthly':
                $this->ends_at->addMonths($count);
                break;
            case 'bimonthly':
                $this->ends_at->addMonths(2 * $count);
                break;
            case 'quarterly':
                $this->ends_at->addMonths(3 * $count);
                break;
            case 'months':
                $this->ends_at->addMonths($count);
                break;
            case 'annually':
                $this->ends_at->addYears($count);
                break;
            case 'bienially':
                $this->ends_at->addYears(2 * $count);
                break;
            case 'triennialy':
                $this->ends_at->addYears(3 * $count);
                break;
            case 'years':
                $this->ends_at->addYears($count);
                break;

            default:
                $this->ends_at->addDays($count);
                break;
        }
        return $this;
    }

    function gracePeriod(callable |int $period)
    {
        if (is_a($period, 'Closure')) {
            $period = $period($this);
        }

        $this->ends_at->addDays($period);
        return $this;
    }

    function cancel($end = false)
    {
        $this->canceled_at = now();

        if ($end) {
            $this->ends_at = now();
        }

        $this->save();
        return $this;
    }

    function adjustStart(int $days)
    {
        $this->starts_at = now()->addDays($days);
        $this->save();
        return $this;
    }
}