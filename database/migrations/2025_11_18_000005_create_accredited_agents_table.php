<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accredited_agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('agency_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('status')->default('pending'); // pending, approved, suspended
            $table->string('password')->nullable(); // hashed password for agent login
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accredited_agents');
    }
};
