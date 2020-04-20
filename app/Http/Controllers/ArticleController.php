<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
 
   public function __construct()
   {
      $this->middleware('auth');
   }   

   public function index()
   {
         $articles = Article::latest()->get();
         return view('articles.index',compact('articles'));
   }   


   public function show(Article $article)
   {
         return view('articles.show',compact('article'));
   }
}
