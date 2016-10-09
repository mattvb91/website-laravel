<?php

namespace Test\Acceptance;

use App\Models\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class LayoutTest extends TestCase
{

    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->createUserAndLogin();
    }

    public function testPagesForNoSidebar()
    {
        $this->get('/admin/article')
            ->seeStatusCode(200)
            ->dontSeeElement('col-md-3')
            ->dontSee('Latest Posts');

        $this->get('/admin/page')
            ->seeStatusCode(200)
            ->dontSeeElement('col-md-3')
            ->dontSee('Latest Posts');

        $this->get('/admin/tag')
            ->seeStatusCode(200)
            ->dontSeeElement('col-md-3')
            ->dontSee('Latest Posts');
    }
}