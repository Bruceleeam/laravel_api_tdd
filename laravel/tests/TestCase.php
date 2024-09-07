<?php

namespace Tests;

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

    public function createUser ($args = [])
    {
        return User::factory()->create($args);
    }
}
