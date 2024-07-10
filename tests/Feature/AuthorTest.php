<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Authors;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
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
            'name' => 'Test',
            'bio' => 'Test',
            'birth_date' => '2024-08-10'
        ];

        $task = Authors::create($data);

        // Assert
        $this->assertInstanceOf(Authors::class, $task);
    }

    public function test_update()
    {
        $data = [
            'name' => 'Test Update',
            'bio' => 'Test',
            'birth_date' => '2024-08-10'
        ];

        $task = Authors::where('bio', 'Test')->first();
            $task->update($data);

        $this->assertInstanceOf(Authors::class, $task);
    }

    public function test_delete()
    {
        $task = Authors::where('bio', 'Test')->first();
            $task->delete();

        $this->assertInstanceOf(Authors::class, $task);
    }
}
