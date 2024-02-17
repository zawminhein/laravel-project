@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

         <div class="card mb-2 border-primary">
            <div class="card-body">
               <h3>{{ $article->title }}</h3>
                  <div>
                     <small class="text-muted">
                        <b>Category: </b>
                           <span class="text-success">
                              {{ $article->category->name}},
                           </span>
                        {{ $article->created_at }}
                     </small>
                  </div>
                  <div style="font-size: 1.3em" class="mb-2">
                     {{ $article->body }}
                  </div>

                  <a href="{{ url("/articles/delete/$article->id")}}" class="btn btn-outline-danger">
                     Delete
                  </a>
            </div>
         </div>

         <ul class="list-group mt-4">
            <li class="list-group-item active">
               Comments ({{ count($article->comments) }})
            </li>
            @foreach ($article->comments as $comment)
               <li class="list-group-item">
                  <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>

                  {{ $comment->content }}
               </li>
            @endforeach
         </ul>
    </div>
@endsection