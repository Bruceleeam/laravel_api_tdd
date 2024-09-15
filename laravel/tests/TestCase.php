<?php

namespace Tests;

use App\Models\Item;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    //
    public function setUp() : void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function createItem ($args = [])
    {
        return Item::factory()->create($args);
    }

    public function createUser ($args = [])
    {
        return User::factory()->create($args);
    }
}
