<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class UserRelationshipTest extends TestCase
{
    // This trait clears the database after every test so data doesn't leak!
    use RefreshDatabase;

    /**
     * Test that a user can have multiple posts.
     */
    public function test_user_can_have_many_posts(): void
    {
        // Arrange: Create a user and 3 posts for that user
        $user = User::factory()->create();

        Post::factory()->count(3)->create([
            'user_id' => $user->id
        ]);

        // Act: Retrieve the posts via the relationship
        $retrievedPosts = $user->posts;

        // Assert: Verify the count and the relationship
        $this->assertCount(3, $retrievedPosts);
        $this->assertInstanceOf(Post::class, $retrievedPosts->first());
    }
}
