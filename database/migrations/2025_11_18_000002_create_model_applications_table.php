<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('model_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('age_range')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedSmallInteger('height_cm')->nullable();
            $table->string('primary_category')->nullable();
            $table->boolean('has_experience')->default(false);
            $table->text('experience_notes')->nullable();
            $table->text('portfolio_links')->nullable();
            $table->string('status')->default('pending');
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('model_applications');
    }
};
