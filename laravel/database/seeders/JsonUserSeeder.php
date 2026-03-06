<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class JsonUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Locate the local JSON file
        $path = database_path('data/users.json');

        // Read the file
        $json = File::get($path);

        // Convert JSON string to a PHP array
        $users = json_decode($json, true);

        // Loop through and save to the database
        foreach ($users as $userData) {
            User::updateOrCreate(
                ['id' => $userData['id']], // Use the ID from JSON as the unique check
                [
                    'name'     => $userData['name'],
                    'email'    => $userData['email'],
                    'username' => $userData['username'],
                    'phone'    => $userData['phone'],
                    'website'  => $userData['website'],
                    'password' => Hash::make('password'), // Required by the users table
                ]
            );
        }
    }
}
