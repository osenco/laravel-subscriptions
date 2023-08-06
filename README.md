# Laravel Subscriptions

Laravel subscription package

## Installation

    ```bash
    composer require osenco/subscriptions
    ```

    ```bash
    php artisan vendor:publish --provider="Osenco\Subscriptions\SubscriptionsServiceProvider"
    ```

    ```bash
    php artisan migrate
    ```

    ```bash
    php artisan db:seed --class="Osenco\Subscriptions\Database\Seeders\SubscriptionSeeder"
    ```

    ```bash
    php artisan db:seed --class="Osenco\Subscriptions\Database\Seeders\PlanSeeder"
    ```

    ```bash
    php artisan db:seed --class="Osenco\Subscriptions\Database\Seeders\PlanFeatureSeeder"
    ```

        ```bash
        php artisan subscriptions:install
        ```
