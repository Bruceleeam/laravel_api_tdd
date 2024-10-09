<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase as TestCase;

class ItemTest extends TestCase 
{
    use RefreshDatabase;

    public function test_item_belongs_to_a_user(): void
    {
        $user = $this->createUser();
        $item = $this->createItem(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $item->user);
    }
}
