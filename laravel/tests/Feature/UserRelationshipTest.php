<?php

namespace Tests\Feature;

use App\Models\Comment;
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

    /**
     * Test that we can reach comments through a user's post.
     */
    public function test_user_can_reach_comments_through_posts(): void
    {
        // Arrange: Create a user with one post, and that post has 5 comments
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        Comment::factory()->count(5)->create([
            'post_id' => $post->id
        ]);

        // Act: Reach the comments starting from the User
        $commentCount = $user->posts()->first()->comments()->count();

        // Assert
        $this->assertEquals(5, $commentCount);
    }
}
