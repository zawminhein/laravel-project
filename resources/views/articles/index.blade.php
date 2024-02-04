@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

        {{ $articles->links() }}

        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h3>{{ $article->title }}</h3>
                    <div>
                        <small class="text-muted">
                            {{ $article->created_at }}
                        </small>
                    </div>
                    <div>{{ $article->body }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection