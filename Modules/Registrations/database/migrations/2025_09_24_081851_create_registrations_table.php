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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade')->nullable();

            //$table->string('emis_code')->unique();
    $table->json('data')->nullable();

    //cies_reports
    $table->json('cies_reports')->nullable();
    
            $table->enum('status', ['in_progress', 'approved', 'rejected', 'needs_applicant_input'])->default('in_progress');//->change();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
