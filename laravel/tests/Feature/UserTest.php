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
        $this->user = $this->createUser(
            [
                'name' => 'Test',
                'email' => 'testd@example.com',
                'password' => 'password'
            ]
        );
    }

    /**
     * A basic feature test example.
     */
    public function test_fetch_users(): void
    {

        //action / perform
        $response = $this->getJson(route('users.index'));

        //assertion / predict
        $this->assertCount(1, $response->json());

    }

    public function test_show_user()
    {
        // action / perform
        $response = $this->getJson(route('users.show', $this->user->id))
                    ->assertOk()
                    ->json();

        // assertion / predict
        $this->assertEquals($response['name'], $this->user->name);
    }

    public function test_store_new_user()
    {
        // preparation / prepare
        $user = User::factory()->make();

        // action / perform
        $response = $this->postJson(route('users.store',
            [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ]))
            ->assertCreated()
            ->json();

        $this->assertEquals($user->email, $response['email']);

        // assertion / predict
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    public function test_update_user()
    {
        $this->patchJson(route('users.update', $this->user->id), ['name' => 'updated name'])
        ->assertOk();

        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'name' => 'updated name']);
    }

    public function test_delete_user()
    {
        $this->deleteJson(route('users.destroy', $this->user));

        $this->assertDatabaseMissing('users', ['email' => $this->user->email]);
    }

    public function test_while_storing_user_fields_validation()
    {
        $this->withExceptionHandling();

        $this->postJson(route('users.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }

    public function test_while_updating_user_fields_validation()
    {
        $this->withExceptionHandling();

        $this->patchJson(route('users.update', $this->user->id))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }

}
