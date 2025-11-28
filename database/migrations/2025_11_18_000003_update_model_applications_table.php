<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('model_applications', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('id');
            $table->string('last_name')->nullable()->after('first_name');
            $table->date('date_of_birth')->nullable()->after('age_range');
            $table->string('address')->nullable()->after('country');
            $table->string('membership_option')->nullable()->after('country');
            $table->string('skin_tone')->nullable()->after('membership_option');
            $table->unsignedSmallInteger('chest_bust_cm')->nullable()->after('height_cm');
            $table->unsignedSmallInteger('waist_cm')->nullable()->after('chest_bust_cm');
            $table->string('hair_color')->nullable()->after('waist_cm');
            $table->string('eye_color')->nullable()->after('hair_color');
            $table->string('shoe_size')->nullable()->after('eye_color');
            $table->string('talents')->nullable()->after('primary_category');
            $table->string('subject')->nullable()->after('talents');
            $table->text('additional_information')->nullable()->after('subject');
            $table->json('profile_images')->nullable()->after('portfolio_links');
        });
    }

    public function down(): void
    {
        Schema::table('model_applications', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'last_name',
                'date_of_birth',
                'address',
                'membership_option',
                'skin_tone',
                'chest_bust_cm',
                'waist_cm',
                'hair_color',
                'eye_color',
                'shoe_size',
                'talents',
                'subject',
                'additional_information',
                'profile_images',
            ]);
        });
    }
};
