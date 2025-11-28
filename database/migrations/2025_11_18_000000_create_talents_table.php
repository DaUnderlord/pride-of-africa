<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('talents', function (Blueprint $table) {
            $table->id();
            $table->string('talent_code')->unique();
            $table->string('slug')->unique();
            $table->string('display_name');
            $table->string('primary_role')->nullable();
            $table->string('category')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('gender')->nullable();
            $table->string('age_range')->nullable();
            $table->unsignedSmallInteger('height_cm')->nullable();
            $table->unsignedSmallInteger('bust_cm')->nullable();
            $table->unsignedSmallInteger('waist_cm')->nullable();
            $table->unsignedSmallInteger('hips_cm')->nullable();
            $table->string('shoe_size')->nullable();
            $table->text('short_bio')->nullable();
            $table->string('hero_image_url')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('talents');
    }
};
