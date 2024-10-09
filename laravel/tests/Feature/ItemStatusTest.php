<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;

class ItemStatusTest extends TestCase
{
    use RefreshDatabase;
    public function test_item_status_can_be_changed(): void
    {
        $item = $this->createItem();

        $this->patchJson(route('items.update', $item->id), ['status' => ITEM::STARTED]);

        $this->assertDatabaseHas('items', ['status' => ITEM::STARTED]);
    }
}
