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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade')->nullable();

            


            $table->unsignedInteger('current_application_status_id')->nullable();
            //$table->foreignId('current_application_status_id')->constrained('application_statuses')->onDelete('cascade')->nullable();  
            $table->json('meta')->nullable();
            $table->string('current_reviewer_role')->nullable()->default('nobody');

            //$table->string('to_be_reviewed_by')->default('nobody');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
