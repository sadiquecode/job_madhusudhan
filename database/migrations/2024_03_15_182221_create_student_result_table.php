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
        Schema::create('student_result', function (Blueprint $table) {
            $table->id();
            $table->string('s_registration_number');
            $table->string('s_name')->nullable();
            $table->string('s_mobile_number')->nullable();
            $table->string('s_class_section')->nullable();
            $table->string('s_subject_1')->nullable();
            $table->string('s_subject_2')->nullable();
            $table->string('s_subject_3')->nullable();
            $table->string('s_subject_4')->nullable();
            $table->string('s_subject_5')->nullable();
            $table->string('s_subject_6')->nullable();
            $table->string('s_percentage')->nullable();
            $table->string('s_other_message')->nullable();
            $table->enum('status', ['sent', 'active'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_result');
    }
};
