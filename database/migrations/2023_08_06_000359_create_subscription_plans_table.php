<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Osen\Subscriptions\Models\SubscriptionPlan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('subscriptions.subscriptions_table', 'user_subscriptions'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('details')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('amount', 10, 2)->default(0);
            $table->foreignIdFor(SubscriptionPlan::class, 'plan_id')->nullable();
            
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('subscriptions.subscriptions_table', 'user_subscriptions'));
    }
};
