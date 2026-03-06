<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the necessary seeders in the correct order
        $this->call([
            JsonUserSeeder::class,
            JsonPostSeeder::class,
            JsonCommentSeeder::class,
        ]);
    }
}
