<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function test_it_calculates_reading_time_correctly(): void
    {
        // Arrange: Set up the specific state for the test
        // We want exactly 400 words to expect a 2-minute result
        $bodyContent = str_repeat('word ', 400);
        $post = new Post(['body' => $bodyContent]);

        // Act: Execute the specific behavior we are testing
        $result = $post->getReadingTime();

        // Assert: Verify the outcome matches our expectation
        $this->assertEquals(2, $result);
        $this->assertIsInt($result);
    }
}
