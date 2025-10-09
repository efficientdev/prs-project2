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
        // database/migrations/xxxx_xx_xx_create_applications_table.php
Schema::create('application1s', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    //$table->enum('status', ['in_progress', 'approved', 'rejected'])->default('in_progress');
    $table->enum('status', ['in_progress', 'approved', 'rejected', 'needs_applicant_input'])->default('in_progress');//->change();
    
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application1s');
    }
};
