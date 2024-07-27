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
            $table->string('democlass')->nullable()->nullable();
            $table->enum('referredBy', ['newspaper', 'socialmedia', 'friends', 'others'])->nullable();
            $table->string('profile_img')->nullable();
            $table->string('cv')->nullable();
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
