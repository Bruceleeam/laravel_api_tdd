<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $item;

    public function setUp():void
    {
        parent::setUp();        
    }

    /**
     * A basic feature test example.
     */
    public function test_fetch_all_items_of_a_user(): void
    {
        $user = $this->createUser();
        $item = $this->createItem(args: ['user_id' => $user->id]);
        
        // action
        $response = $this->getJson(route('users.items.index', $user->id))->assertOk()->json();

        //assertion
        $this->assertCount(1, $response);

        $this->assertEquals($item->title,$response[0]['title']);
        $this->assertEquals($response[0]['user_id'], $user->id);
    }

    /**
     * Summary of test_store_item_for_a_user
     * @return void
     */
    public function test_store_item_for_a_user()
    {
        $user = $this->createUser();
        $item = Item::factory()->make();

        $this->postJson(route('users.items.store', $user->id), ['title' => $item->title])
        ->assertCreated();

        $this->assertDatabaseHas('items', [
            'title' => $item->title, 
            'user_id' => $user->id 
        ]);
    }

    /**
     *
     *
     * @return void
     */
    public function test_delete_item_from_database()
    {
        $item = $this->createItem();
        $this->deleteJson(route('items.destroy', $item->id))
        ->assertNoContent();

        $this->assertDatabaseMissing('items', ['title' => $item->title]);
    }

    public function test_update_a_item_of_a_user()
    {
        $item = $this->createItem();

        $this->patchJson(route('items.update', $item->id), ['title' => 'updated title'])
        ->assertOk();

        $this->assertDatabaseHas('items', ['title' => 'updated title']);
    }

}
