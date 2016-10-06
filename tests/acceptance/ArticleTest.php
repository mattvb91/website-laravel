<?php

namespace Test\Acceptance;

use App\Models\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class ArticleTest extends TestCase
{

    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        factory(Article::class, 20)->create();
    }

    public function testIndex()
    {
        $this->get('/article')
            ->seeStatusCode(200)
            ->see('Articles');

        $this->get('/article?page=2')
            ->seeStatusCode(200)
            ->see('Articles');
    }

    public function testShow()
    {
        $article = Article::first();
        $this->get('/article/' . $article->slug)
            ->seeStatusCode(200)
            ->see($article->getTitle());
    }
}