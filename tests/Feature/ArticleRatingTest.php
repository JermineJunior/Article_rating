<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\{Article,User};
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleRatingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_not_be_rated_by_guests()
    {
        $article = factory(Article::class)->create();

        $this->post($article->path()."/rate")->assertRedirect('login');

        $this->assertEmpty($article->ratings);
    }
    /** @test*/
    public function it_can_be_rated_by_authenticated_users()
    {
        $this->signIn();
        $article = factory(Article::class)->create();

        $this->post($article->path()."/rate",['rating' => 5]);

        $this->assertEquals(5,$article->rating());
    }
    /** @test */
    public  function it_requires_a_valid_rating()
    {
        $this->signIn();
        $article = factory(Article::class)->create();

        $this->post($article->path()."/rate")->assertSessionHasErrors();

        $this->post($article->path()."/rate",['rating'=> 'foo'])->assertSessionHasErrors();

    }
    /** @test */
    public function it_can_not_be_rated_below_1()
    {
        $this->signIn();
        $article = factory(Article::class)->create();

        $this->post($article->path()."/rate",['rating'=> -1])->assertSessionHasErrors();
    }
    /** @test */
    public function it_can_not_be_rated_above_5()
    {
        $this->signIn();
        $article = factory(Article::class)->create();

        $this->post($article->path()."/rate",['rating'=> 6])->assertSessionHasErrors();
    }

}
