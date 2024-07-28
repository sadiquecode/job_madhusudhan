<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name')->nullable();
            $table->string('father_name')->nullable();
            $table->date('date')->nullable();
            $table->string('caste')->nullable();
            $table->string('martial_status')->nullable();
            $table->string('language')->nullable();
            $table->string('qualification')->nullable();
            $table->text('address')->nullable();
            $table->string('working_exp')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('salary_expected')->nullable();
            $table->string('salary_drawn')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('democlass')->nullable();
            $table->enum('referredBy', ['newspaper', 'socialmedia', 'friends', 'others'])->nullable();
            $table->string('profile_img')->nullable();
            $table->string('cv')->nullable();
            $table->foreignId('academic_id')->nullable()->constrained('academic')->onDelete('set null');
            $table->foreignId('non_academic_id')->nullable()->constrained('non_academic')->onDelete('set null');
            $table->foreignId('speciality_id')->nullable()->constrained('speciality')->onDelete('set null');
            $table->foreignId('expertise_id')->nullable()->constrained('expertise')->onDelete('set null');
            $table->foreignId('subject_id')->nullable()->constrained('subjects')->onDelete('set null');
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
