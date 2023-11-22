<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_refresh_by_default_limit() : void
    {
        $response = $this->get('/refresh');

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'OK',
        ]);
        
        $this->assertIsArray($response->json('data'));
    }

    public function test_refresh_by_random_limit() : void
    {
        $loadlimit = rand(-10 * 10,100 *10)/10;
        $response = $this->get('/refresh', [
            'loadlimit' => $loadlimit,
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'OK',
        ]);
        
        $this->assertIsArray($response->json('data'));
        $response->assertStatus(200);
    } 
}
