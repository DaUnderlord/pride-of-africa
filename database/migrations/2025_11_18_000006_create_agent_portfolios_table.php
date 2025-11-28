<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agent_portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accredited_agent_id')->constrained('accredited_agents')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agent_portfolios');
    }
};
