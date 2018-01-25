<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_post_can_add_a_comments()
    {
        //Giving a Post
        $post = factory('App\Post')->create();
        // Add a commemnt
        $post->storeComment(['body'=>'this is body', 'user_id'=>1]);
        //factory('App\Comment', 1)->create(['post_id'=>$post->id]);
        // Then post should have a comment
        $this->assertCount(1, $post->comment);
    }
    
    public function test_post_has_a_creator()
    {
        //Giving a Post
        $post = factory('App\Post')->create();
        // expect found User who create post
        $this->assertInstanceOf('App\User', $post->creator);
    }
}
