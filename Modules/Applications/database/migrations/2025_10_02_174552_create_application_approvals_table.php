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
        Schema::create('application_approvals', function (Blueprint $table) {
            $table->id();
            
    $table->foreignId('application1_id')->constrained()->onDelete('cascade');
    $table->foreignId('approval_stage_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Approver

    $table->text('comments')->nullable();
    $table->timestamp('decision_at')->nullable();

    $table->unsignedBigInteger('rollback_stage_id')->nullable();//->after('approval_stage_id');



    $table->enum('status', ['pending', 'approved', 'rejected', 'needs_applicant_input'])->default('pending');//->change();
    $table->text('applicant_response')->nullable();
    $table->timestamp('responded_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_approvals');
    }
};
