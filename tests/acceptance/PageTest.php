<?php

namespace Test\Acceptance;

use App\Models\Page;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class PageTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        factory(Page::class)->create();
        $this->get('/')->assertResponseOk();
    }
}