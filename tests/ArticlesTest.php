<?php


use App\Models\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticlesTest extends TestCase
{

    use DatabaseTransactions;

    public function testFactory()
    {
        factory(Article::class)->create();

        $article = Article::first();

        $this->assertInstanceOf(Article::class, $article);
        $this->assertTrue($article->exists());
    }

    public function testGetUser()
    {
        factory(Article::class)->create();

        $article = Article::first();

        $this->assertInstanceOf(\App\Models\User::class, $article->user);
    }

    public function testIndex()
    {
        factory(Article::class, 20)->create();

        $this->get('/article')
            ->seeStatusCode(200)
            ->see('Articles');

        $this->get('/article?page=2')
            ->seeStatusCode(200)
            ->see('Articles');
    }

    public function testShow()
    {
        factory(Article::class)->create();

        $article = Article::first();
        $this->get('/article/' . $article->getKey())
            ->seeStatusCode(200)
            ->see($article->getTitle());
    }
}