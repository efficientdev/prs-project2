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
        Schema::table('public_validations', function (Blueprint $table) {
            
            $table->decimal('ptr')->nullable();
            $table->decimal('gpi')->nullable();
            $table->decimal('ger')->nullable();
            $table->decimal('qtr')->nullable();
            $table->decimal('sii')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('public_validations');
    }
};
