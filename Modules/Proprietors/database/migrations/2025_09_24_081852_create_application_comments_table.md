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
        Schema::create('application_comments', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('application_id')->constrained()->onDelete('cascade')->nullable();  

            $table->unsignedInteger('application_status_id');
            //$table->foreignId('application_status_id')->constrained('application_statuses')->onDelete('cascade')->nullable();  
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade')->nullable();  
            $table->string('reviewer_role')->nullable()->default('nobody');

            $table->json('meta')->nullable();
            $table->enum('status', ['approved', 'rejected']);

            //$table->string('status')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_comments');
    }
};
