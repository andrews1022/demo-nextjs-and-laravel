<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JsonPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Locate the local JSON file
        $path = database_path('data/posts.json');

        // Read the file
        $json = File::get($path);

        // Convert JSON string to a PHP array
        $posts = json_decode($json, true);

        // Loop through and save to the database
        foreach ($posts as $postData) {
            Post::updateOrCreate(
                ['id' => $postData['id']],
                [
                    'user_id' => $postData['userId'], // Mapping JSON userId to DB user_id
                    'title'   => $postData['title'],
                    'body'    => $postData['body'],
                ]
            );
        }
    }
}
