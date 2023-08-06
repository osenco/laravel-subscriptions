# Laravel Subscriptions

Laravel subscription package

## Installation

```bash
composer require osenco/subscriptions
```

## Setup & configuration

```bash
php artisan vendor:publish --provider="Osen\Subscriptions\SubscriptionsServiceProvider"
```

```bash
php artisan migrate
```

// OR use the install command

```bash
php artisan subscriptions:install
```

## Usage

### Add trait to your user model

```php
use Osen\Subscriptions\Concerns\HasSubscriptions;

class User extends Authenticatable
{
    use HasSubscriptions; // <- here
}
```

### Create a plan

```php
use Osen\Subscriptions\Models\SubscriptionPlan;

$plan = SubsriptionPlan::create([
    'name' => 'Basic',
    'description' => 'Basic plan',
    'price' => 1000,
    'interval' => 'month',
    'interval_count' => 1,
    'trial_period_days' => 30,
    'active' => true,
]);
// OR use the Plan Facade

$plan->called('Basic')
    ->describedAs('Basic plan')
    ->pricedAt(1000)
    ->interval('month')
    ->intervalCount(1)
    ->trialPeriodDays(30)
    ->active()
    ->save();
```

### Subscribe a user to a plan

```php
use Osen\Subscriptions\Facades\Subscription;
use Osen\Subscriptions\Facades\Subscribe;

$user = User::find(1);
$plan = Plan::find(1);

$subscription = $user->subscribeTo($plan, 1);

//OR use the Subscribe Facade for one or multiple users
$subscription = Subscribe::subscriber($user)->to($plan, 1);
$subscription = Subscribe::subscribers($userIds)->to($plan, 1);
```
#### Add grace period to subscription

```php
$subscription = $user->subscribeTo($plan, 1)->gracePeriodDays(7);
```
