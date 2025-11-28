<?php

namespace Database\Seeders;

use App\Models\Talent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TalentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'talent_code' => 'T-0458',
                'display_name' => 'Editorial Model – Lagos',
                'primary_role' => 'Editorial Model',
                'category' => 'Fashion / Editorial',
                'city' => 'Lagos',
                'country' => 'Nigeria',
                'gender' => 'Female',
                'age_range' => '20–25',
                'height_cm' => 176,
                'bust_cm' => 84,
                'waist_cm' => 62,
                'hips_cm' => 90,
                'shoe_size' => '39 EU',
                'hero_image_url' => 'https://images.pexels.com/photos/3760852/pexels-photo-3760852.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'short_bio' => 'Lagos-based editorial model with a focus on cinematic campaigns, beauty close-ups and runway-ready lines.',
                'is_verified' => true,
            ],
            [
                'talent_code' => 'T-0389',
                'display_name' => 'Commercial Talent – Accra',
                'primary_role' => 'Commercial / Lifestyle',
                'category' => 'Commercial / Lifestyle',
                'city' => 'Accra',
                'country' => 'Ghana',
                'gender' => 'Male',
                'age_range' => '25–30',
                'height_cm' => 182,
                'bust_cm' => null,
                'waist_cm' => 78,
                'hips_cm' => 94,
                'shoe_size' => '43 EU',
                'hero_image_url' => 'https://images.pexels.com/photos/1848565/pexels-photo-1848565.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'short_bio' => 'Pan-African commercial face for lifestyle, fintech and transport campaigns with an easy, grounded presence on set.',
                'is_verified' => true,
            ],
            [
                'talent_code' => 'T-0521',
                'display_name' => 'Film / TV Actor – Nairobi',
                'primary_role' => 'Film / TV Actor',
                'category' => 'Film / TV',
                'city' => 'Nairobi',
                'country' => 'Kenya',
                'gender' => 'Female',
                'age_range' => '28–35',
                'height_cm' => 170,
                'bust_cm' => 88,
                'waist_cm' => 68,
                'hips_cm' => 96,
                'shoe_size' => '40 EU',
                'hero_image_url' => 'https://images.pexels.com/photos/1183266/pexels-photo-1183266.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'short_bio' => 'Screen actor with experience in long-form drama and pan-African campaigns. Fluent EN / FR.',
                'is_verified' => true,
            ],
            [
                'talent_code' => 'T-0194',
                'display_name' => 'Runway & Editorial – Cape Town',
                'primary_role' => 'Runway / Editorial',
                'category' => 'Runway',
                'city' => 'Cape Town',
                'country' => 'South Africa',
                'gender' => 'Male',
                'age_range' => '22–28',
                'height_cm' => 188,
                'bust_cm' => null,
                'waist_cm' => 76,
                'hips_cm' => 92,
                'shoe_size' => '44 EU',
                'hero_image_url' => 'https://images.pexels.com/photos/7671166/pexels-photo-7671166.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'short_bio' => 'Runway and editorial talent working between Cape Town, Paris and Milan fashion weeks.',
                'is_verified' => true,
            ],
        ];

        foreach ($records as $data) {
            Talent::updateOrCreate(
                ['talent_code' => $data['talent_code']],
                array_merge($data, [
                    'slug' => Str::slug($data['talent_code'].'-'.$data['city']),
                    'is_active' => true,
                ])
            );
        }
    }
}
