<?php

namespace Tests\Feature;

use App\Models\Ads;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_example_create()
    {
        $response = $this->get('/create');

        $response->assertStatus(200);
    }

    public function test_example_create_ad()
    {
        Storage::fake('avatars');
        $image = UploadedFile::fake()->image('avatar.jpg', 100, 100)->size(100);

        $response = $this->post('http://127.0.0.1:8000/api/ads', [
            'name' => 'Test',
            'fromdate' => now(),
            'todate' => now()->addDays(10),
            'totalbudget' => 15.1,
            'dailybudget' => 3.4,
            'image' => $image
        ]);

        Storage::disk('avatars')->assertExists($image->hashName());
        $response->assertRedirect('/');
    }
}
