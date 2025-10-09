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
        Schema::create('application_statuses', function (Blueprint $table) {
            //$table->integer('id')->primary();
            $table->unsignedInteger('id')->primary();

            $table->integer('next_id');

            /*$table->integer('actor_role_id');
            $table->integer('next_role_id');*/


            $table->foreignId('actor_role_id')->constrained('roles')->onDelete('cascade')->nullable();
            
            $table->foreignId('next_role_id')->constrained('roles')->onDelete('cascade')->nullable();
            
            $table->string('status_name');
            $table->string('next_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_statuses');
    }
};
