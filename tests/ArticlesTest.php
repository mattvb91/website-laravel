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
}