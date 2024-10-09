<?php

namespace Tests\Unit;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase as TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_have_many_items(): void
    {
        $user = $this->createUser();
        $item = $this->createItem(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $item->user);
    }
}
