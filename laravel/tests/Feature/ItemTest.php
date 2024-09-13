<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->item = $this->createItem(
            [
                'name' => 'Test',
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
    }
}
