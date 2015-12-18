<?php


use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetUser()
    {
        factory(User::class, 50)->create();

        $user = User::first();

        $this->assertInstanceOf(User::class, $user);
        $this->assertTrue($user->exists());
    }
}
