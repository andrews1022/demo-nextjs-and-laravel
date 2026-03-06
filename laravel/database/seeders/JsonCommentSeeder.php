<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JsonCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Locate the local JSON file
        $path = database_path('data/comments.json');

        // Read the file
        $json = File::get($path);

        // Convert JSON string to a PHP array
        $comments = json_decode($json, true);

        // Loop through and save to the database
        foreach ($comments as $commentData) {
            Comment::updateOrCreate(
                ['id' => $commentData['id']], // Use the ID from JSON as the unique check
                [
                    'post_id' => $commentData['postId'], // Map "postId"
                    'name'    => $commentData['name'],
                    'email'   => $commentData['email'],
                    'body'    => $commentData['body'],
                ]
            );
        }
    }
}
