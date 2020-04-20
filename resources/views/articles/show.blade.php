@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mx-4 my-3 px-4 py-2 shadow" style="width:40rem;">
            <div class="card-title text-lg font-semibold">
                {{$article->title}}
            </div>
            <div class="card-body">
                {{ $article->body}}
            </div>
            <hr>
            @if(auth())
               <star-rating
                :initial="{{$article->ratingFor(auth()->user()) ?: 0}}"
                action="/articles/{{$article->id}}/rate" >
               </star-rating>
              <span class="text-lg text-center">Averge Rating: {{ $article->rating() }}</span>
              @else
              <div>
                  Please <a href="/login">Sign In</a> To Rate this article
                
             </div>
                @endif
            </div>
    </div>
@endsection
