@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        @foreach($articles as $article)
            <div class="card mx-4 my-3 px-4 py-2" >
                <div class="card-title">
                    {{$article->title}}
                </div>
                <div class="card-body">
                    {{$article->body}}
                </div>
                <div class="card-footer flex items-center">
                    @foreach($article->ratings as $rate)
                        {{$rate}}
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
