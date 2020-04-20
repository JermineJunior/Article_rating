<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleRatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Article $article)
    {
        request()->validate([
            'rating'   =>  ['required','in:1,2,3,4,5']
        ]);
        $article->rate(request('rating'));
    }

}
