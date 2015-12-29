<?php

namespace Test\Acceptance;

use Test\TestCase;

class PageTest extends TestCase
{

    public function testIndex()
    {
        $this->get('/')->assertResponseOk();
    }
}