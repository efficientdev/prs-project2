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
        Schema::create('t_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('requirement_name');
            
            // T1 to T9 columns
            for ($i = 1; $i <= 9; $i++) {
                $table->integer("visible_in_t{$i}")->default(0);
                $table->longText("t{$i}_note")->nullable();
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_requirements');
    }
};
