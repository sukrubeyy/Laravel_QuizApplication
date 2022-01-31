<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Result;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            quiz_seeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ResultSeeder::class,
        ]);

    }
}
