<?php

namespace Test\Acceptance;

use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class TagTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        factory(Tag::class, 20)->create();
    }

    public function testSideBar()
    {
        $tag = Tag::first();

        $this->get('/')->seeStatusCode(200)
            ->see($tag->getName());
    }
}