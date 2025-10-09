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
        Schema::table('applications', function (Blueprint $table) {

    //$table->enum('status', ['in_progress', 'approved', 'rejected'])->default('in_progress');

/*
    $table->enum('status', ['in_progress', 'approved', 'rejected', 'needs_applicant_input'])->default('in_progress')->change();
    */


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
