<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Tests\TestCase;
use App\{Article,User};
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Model|mixed
     */
    private $user;
    /**
     * @var Model|mixed
     */
    private $article;

    protected function setUp()
    {
         parent::setUp();
         $this->user  = factory(User::class)->create();
         $this->article = factory(Article::class)->create();
    }

    /** @test */
    public function it_can_be_rated()
    {
        $this->article->rate(5,$this->user);

        $this->assertCount(1, $this->article->ratings);
    }

      /** @test */
      public function it_can_determine_average_rating()
      {
        $this->article->rate(5,$this->user);
        $this->article->rate(1,factory(User::class)->create());

          $this->assertEquals(3, $this->article->rating());
      }

      /** @test*/
      public function it_can_fetch_a_user_rating() 
      {
         $this->article->rate(5,$this->user);

         $rating = $this->article->ratingFor($this->user);

         $this->assertEquals(5,$rating);
      }

      /** @test */
      public function it_can_not_be_rated_above_5()
      {
        $this->expectException(InvalidArgumentException::class);

        $this->article->rate(6,$this->user);
      }

      /** @test */
      public function it_can_not_be_rated_below_1()
      {
        $this->expectException(InvalidArgumentException::class);

        $this->article->rate(0,$this->user);
      }

        /** @test  */
        public function it_can_only_be_rated_once_per_user()
        {
            $this->actingAs($this->user);

            $this->article->rate(5);
            $this->article->rate(1);

          $this->assertEquals(1, $this->article->rating());
        }

}
