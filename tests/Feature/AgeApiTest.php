<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class AgeApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_api_age()
    {
        $response = $this->postJson('/api/age', ['age' => -1]);
        $response->assertStatus(500)
        ->assertJson(function (AssertableJson $json) {
            return $json->where('message', "ERROR")
                 ->etc();
        });

        $response = $this->postJson('/api/age', ['age' => 3]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "無料")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 5]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "無料")
                 ->etc();
        });

        $response = $this->postJson('/api/age', ['age' => 6]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "500円")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 10]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "500円")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 12]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "500円")
                 ->etc();
        });

        $response = $this->postJson('/api/age', ['age' => 13]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "1,000円")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 15]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "1,000円")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 17]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "1,000円")
                 ->etc();
        });

        $response = $this->postJson('/api/age', ['age' => 18]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "1,500円")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 88]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "1,500円")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => 120]);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "1,500円")
                 ->etc();
        });

        $response = $this->postJson('/api/age', ['age' => 121]);
        $response->assertStatus(500)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "ERROR")
                 ->etc();
        });

        $response = $this->postJson('/api/age', ['age' => '0001']);
        $response->assertStatus(200)
        ->assertJson(function (AssertableJson $json)  {
            $json->where('message', "無料")
                 ->etc();
        });
        $response = $this->postJson('/api/age', ['age' => '1+1']);
        $response->assertStatus(500);
    }
}
