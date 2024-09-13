<?php

namespace Tests;

use App\Models\Item;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

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

}
