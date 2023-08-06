<?php

return [
    'models'                           => [
        'user'    => \App\Models\User::class,
        'payment' => '', //e.g \App\Models\Payment::class,
    ],
    'plans_table'                      => 'subscription_plans',
    'subscriptions_table'              => 'subscriptions',
    'payments_table'                   => 'payments',
];