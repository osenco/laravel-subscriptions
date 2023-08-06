<?php

namespace Osen\Subscriptions\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
      protected $signature = 'subscription:install';

        protected $description = 'Install the subscription package';

        public function handle()
        {
            $this->info('Installing Subscription...');

            $this->info('Publishing configuration...');

            $this->call('vendor:publish', [
                '--provider' => "Osen\Subscriptions\SubscriptionsServiceProvider",
                '--tag' => "config"
            ]);

            $this->info('Migrating database...');

            $this->call('migrate');

            $this->info('Installed Subscriptions package');
        }
}