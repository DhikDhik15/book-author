<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Books;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_store()
    {
        $data = [
            'title' => 'Test',
            'description' => 'Test',
            'publish_date' => '2024-08-10',
            'author_id' => 123
        ];

        $task = Books::create($data);

        // Assert
        $this->assertInstanceOf(Books::class, $task);
    }

    public function test_update()
    {
        $data = [
            'title' => 'Test Update',
            'description' => 'Test',
            'publish_date' => '2024-08-10',
            'author_id' => 123
        ];

        $task = Books::where('author_id', 123)->first();
            $task->update($data);

        $this->assertInstanceOf(Books::class, $task);
    }

    public function test_delete()
    {
        $task = Books::where('author_id', 123)->first();
            $task->delete();

        $this->assertInstanceOf(Books::class, $task);
    }
}
