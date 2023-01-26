<?php

namespace Tests\Feature;

use App\Models\Test;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TestsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        Auth::login($user);
    }

    public function testCreate()
    {
        $name = 'My new test';

        $response = $this->post('/tests', [
            'user_id' => Auth::id(),
            'name' => $name
        ]);
        $response->assertStatus(302);
        $this->assertCount(1, Test::where('name', 'My new test')->get());
    }

    public function testCreateNotFullData()
    {
        $response = $this->post('/tests', []);
        $response->assertStatus(302);
    }

    public function testEdit()
    {
        $test = Test::factory()->create([
            'user_id' => Auth::id(),
            'name' => 'Old name'
        ]);

        $response = $this->patch("/tests/{$test->id}", [
            'user_id' => Auth::id(),
            'name' => 'My new test'
        ]);
        $response->assertStatus(302);
        $this->assertCount(1, Test::where('name', 'My new test')->get());
    }

    public function testEditModelNotFound()
    {
        $response = $this->get('/tests/1000/edit');
        $response->assertStatus(404);
    }

    public function testDelete()
    {
        $test = Test::factory()->create([
            'user_id' => Auth::id(),
            'name' => 'My new test 1000'
        ]);

        $response = $this->delete("/tests/{$test->id}");
        $response->assertRedirect();
        $this->assertCount(0, Test::where('name', 'My new test 1000')->get());
    }

    public function testDeleteNotExist()
    {
        $response = $this->delete("/tests/1000");
        $response->assertRedirect();
    }
}
