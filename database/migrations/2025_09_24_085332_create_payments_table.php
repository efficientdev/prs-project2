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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // polymorphic relation
            $table->unsignedBigInteger('payable_id');
            $table->string('payable_type');
            
            // mode of payment
            $table->string('payment_type'); // e.g. 'bank' or 'online'
            
            // JSON column for extra metadata
            $table->json('meta')->nullable();
            
            // status: pending, completed, failed, approved, etc
            $table->string('status')->default('pending');
            
            // for online references
            $table->string('reference')->nullable()->unique();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
