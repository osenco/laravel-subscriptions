<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('subscriptions.plans_table', 'plans'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('details')->nullable();
            $table->enum('interval', [
                'daily', 
                'days', 
                'weekly', 
                'biweekly', 
                'weeks', 
                'monthly', 
                'bimonthly',
                'quarterly',
                'months', 
                'annually',
                'biannualy',
                'bienially',
                'triennialy',
                'years',
            ]);
            $table->decimal('price', 10, 2);
            $table->json('discounts')->nullable();
            $table->json('features')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('subscriptions.plans_table', 'plans'));
    }
};
