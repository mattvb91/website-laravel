<?php

namespace Test\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    public function testFactory()
    {
        factory(User::class, 50)->create();

        $user = User::first();

        $this->assertInstanceOf(User::class, $user);
        $this->assertTrue($user->exists());
    }
}
