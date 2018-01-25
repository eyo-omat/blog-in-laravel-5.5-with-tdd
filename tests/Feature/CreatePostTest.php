<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_create_post(){
        $this->withoutExceptionHandling();
        // Given a Guest 
        $guest = factory ('App\User')->create(); 
          // make a guest become User 
        $user = $this->be($guest); 
         // And Giving Post object 
        $post = factory('App\Post')->make(); 
         // When the user creates Post 
        $this->post('/post/'.$post->id, $post->toArray()); 
         // When their visit 
        $response = $this->get('/blog/'.$post->id); 
         // Then their should see post 
        $response->assertSee($post->title);
    }
}
