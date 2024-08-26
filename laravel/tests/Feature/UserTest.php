<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
   use RefreshDatabase;

   private $user;

    public function setUp():void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        // No Factory used
        // User::create(
        //     [
        //         'name' => 'unit_test_user_zero',
        //         'email' => 'user_zero@testmail',
        //         'password' => 'user_zero_password'
        //     ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_fetch_users(): void
    {
        //preparation / prepare
       

        //action / perform
        $response = $this->getJson(route('users.index'));

        //assertion / predict
        $this->assertEquals(1, count($response->json()));

    }

    public function test_show_user()
    {
        // preparation / prepare

        // action / perform
        $response = $this->getJson(route('users.show', $this->user->id))
                    ->assertOk()
                    ->json();

        // assertion / predict
        $this->assertEquals($response['name'], $this->user->name);
    }

}
