<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Seeders\PostsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    private $first10posts;
    private $second10posts;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_posts_index()
    {
        // $this->seed(PostsSeeder::class);
        Post::factory(20)->for(User::factory())->create();

        $this->first10posts = Post::with('user')->take(10)->where('is_published', true)->get();
        $this->second10posts = Post::with('user')->take(10)->offset(10)->where('is_published', true)->get();


        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee("Posts");
        foreach ($this->first10posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->user->name);
        }

        foreach ($this->second10posts as $post) {
            $response->assertDontSee($post->title);
        }
    }

    public function test_creating_post()
    {
        Tag::factory(5)->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/posts', [
                'title' => 'test title',
                'body' => 'sflkh askjfhskjfsfj',
                'is_published' => '1',
                'tags' => ['1', 2]
            ]);

        $post = Post::where('title', 'test title')->first();

        $response->assertStatus(302);
        $response->assertHeader('location', route('posts.show', ['post' => $post]));
        $response->assertSessionHas('post_created_successfully', true);

        $this->assertDatabaseHas('posts', [
            'title' => 'test title',
            'body' => 'sflkh askjfhskjfsfj',
            'is_published' => '1',
        ]);

        $this->assertDatabaseHas('post_tags', [
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        $this->assertDatabaseHas('post_tags', [
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
    }
}
