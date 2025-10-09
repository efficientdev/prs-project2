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
        Schema::create('prv_ins_categories', function (Blueprint $table) {
            $table->id();

$table->string('category_id');
            $table->string('category_name');
            $table->integer('category_min_length');
            $table->integer('category_min_breadth');
            $table->integer('category_app_fee');
            $table->integer('visible');
            $table->longText('classes')->nullable();
            $table->longText('required_details')->nullable();
            $table->longText('required_utilities')->nullable();
            $table->longText('teaching_staff')->nullable();
            $table->longText('statutory_records')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prv_ins_categories');
    }
};
