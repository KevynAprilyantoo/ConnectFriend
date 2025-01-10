<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Field;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Alice Johnson',
            'email' => 'lim.kevyn@gmail.com',
            'balance' => '0',
            'password' => bcrypt('password123'),
            'gender' => 'Female',
            'linkedin' => 'https://www.linkedin.com/in/alicejohnson',
            'mobile_number' => '08112345678',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user2 = User::create([
            'name' => 'Bob Smith',
            'email' => 'lim.kevynaprilyanto@gmail.com',
            'balance' => '0',
            'password' => bcrypt('password123'),
            'gender' => 'Male',
            'linkedin' => 'https://www.linkedin.com/in/bobsmith',
            'mobile_number' => '08223456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user3 = User::create([
            'name' => 'Carol Davis',
            'email' => 'lim.aprilyanto@gmail.com',
            'balance' => '0',
            'password' => bcrypt('password123'),
            'gender' => 'Female',
            'linkedin' => 'https://www.linkedin.com/in/caroldavis',
            'mobile_number' => '08334567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $fieldsForUser1 = Field::inRandomOrder()->take(3)->pluck('id');
        $fieldsForUser2 = Field::inRandomOrder()->take(3)->pluck('id');
        $fieldsForUser3 = Field::inRandomOrder()->take(3)->pluck('id');

        // Attach hobi ke pengguna
        $user1->fields()->attach($fieldsForUser1);
        $user2->fields()->attach($fieldsForUser2);
        $user3->fields()->attach($fieldsForUser3);

        $this->call([
            FieldSeeder::class,
        ]);
    }
}
