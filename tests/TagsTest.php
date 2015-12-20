<?php
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TagsTest
 */
class TagsTest extends TestCase
{

    use DatabaseTransactions;

    public function testTagCreate()
    {
        $tag = factory(Tag::class)->create();

        $this->assertNotNull($tag);
        $this->assertInstanceOf(Tag::class, $tag);
    }

    public function testArticleTags()
    {
        $tags = factory(Tag::class, 5)->create();

        foreach($tags as $tag){
            $res[] = $tag->getKey();
        }

        $article = factory(Article::class)->create(); /* @var $article Article */

        $article->tags()->attach($res);
        $this->assertNotEmpty($article->tags->toArray());
    }
}