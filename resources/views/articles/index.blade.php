@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row">
        @forelse ($articles as $article)
            <div class="card mx-4 my-3 px-4 py-2 col-md-3" style="width:22rem;">
                <div class="card-title text-lg font-semibold">
                    <a href="/articles/{{ $article->id }}">
                        {{$article->title}}
                    </a>
                </div>
                <div class="card-body">
                    {{ $article->body}}
                </div>
                <hr>
            </div>
            @empty
            <span class="bg-red-400 text-lg">Sorry No articles yet</span>
            @endforelse
        </div>
            
</div>
@endsection