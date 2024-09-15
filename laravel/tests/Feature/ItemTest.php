<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    private $item;

    public function setUp():void
    {
        parent::setUp();
        $this->item = $this->createItem(
            [
                'title' => 'Test',
            ]
        );
    }

    /**
     * A basic feature test example.
     */
    public function test_fetch_items_of_users(): void
    {

        // action
        $response = $this->getJson(route('items.index'))->assertOk()->json();

        //assertion
        $this->assertCount(1, $response);

        $this->assertEquals("Test",$response[0]['title']);
    }

    /**
     * Summary of test_store_item_for_a_user
     * @return void
     */
    public function test_store_item_for_a_user()
    {
        $item = Item::factory()->make();

        $this->postJson(route('items.store'), ['title' => $item->title])
        ->assertCreated();

        $this->assertDatabaseHas('items', ['title' => 'Test']);
    }

    /**
     * 
     * 
     * @return void
     */
    public function test_delete_item_from_database()
    {
        $this->deleteJson(route('items.destroy', $this->item->id))
        ->assertNoContent();

        $this->assertDatabaseMissing('items', ['title' => $this->item->title]);
    }
}
