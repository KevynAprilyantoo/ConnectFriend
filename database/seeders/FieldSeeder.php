<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Field;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = ['Data Scientist','Machine Learning Engineer','AI Reseacher','Frontend Developer','Backend Developer','Full Stack Developer','Project Manager','Scrum Master','Business Analyst','IT Support'];

        foreach ($fields as $field) {
            Field::create(['name' => $field]);
        }
    }
}
