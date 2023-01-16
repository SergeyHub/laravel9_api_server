<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Exceptions\GeneralJsonException;

class PostRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //public function test_example()
    //{
        //$this->assertTrue(true);
    //}

    public function test_create()
    {
        $repository = $this->app->make(PostRepository::class);

        $payload = [
            'title' => 'heyaa',
            'body' => []
        ];
        $result = $repository->create($payload);

        $this->assertSame($payload['title'], $result->title, 'Post created does not have the same title.');
    }

    public function test_update()
    {

    }

    public function test_delete()
    {

    }
}
