<?php

namespace Test\Unit;

use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Test\TestCase;

class ArticleTest extends TestCase
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


    /**
     * Make sure the slug is made up from the title
     */
    public function testSlug()
    {
        $user = factory(User::class)->create();

        $article = new Article();
        $article->setBody('This is the body');
        $article->setTitle('This is the title');
        $article->user()->associate($user);
        $article->setPublished(Article::PUBLISHED);
        $article->setPublishedAt(Carbon::now());
        $article->save();

        $this->assertEquals('this-is-the-title', $article->slug);
    }

}