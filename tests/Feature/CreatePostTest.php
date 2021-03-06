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
    
    public function test_a_guest_can_not_create_post(){
        $this->withoutExceptionHandling(); 
        // expect thrown exception
        $this->expectException('Illuminate\Auth\AuthenticationException');
         // Given a Guest
        $guest = factory('App\User')->create();
          // And Giving Post object 
        $post = factory('App\Post')->make();
         // When the user create Post
        $this->post('/post', $post->toArray());
    }

    public function test_a_guest_can_not_access_create_post_page(){
        $this->get('/blog/create')->assertRedirect('/login');
    }
}
