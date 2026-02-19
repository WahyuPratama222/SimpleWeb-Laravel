<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Bronze Member',
                'price' => 150000,
                'duration_in_days' => 30,
                'description' => 'Akses gym jam 08:00 - 12:00 saja.',
            ],
            [
                'name' => 'Silver Member',
                'price' => 300000,
                'duration_in_days' => 30,
                'description' => 'Akses gym seharian + Free Loker.',
            ],
            [
                'name' => 'Gold Member',
                'price' => 500000,
                'duration_in_days' => 90,
                'description' => 'Akses gym seharian + Free Loker + Personal Trainer (3x).',
            ],
        ];

        foreach ($packages as $pkg) {
            Membership::create([
                'name' => $pkg['name'],
                'slug' => Str::slug($pkg['name']),
                'price' => $pkg['price'],
                'duration_in_days' => $pkg['duration_in_days'],
                'description' => $pkg['description'],
                'image' => null, // Seeder biasanya tidak upload gambar
            ]);
        }
    }
}
