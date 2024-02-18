@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

      @if (session("info"))
         <div class="alert alert-info">
            {{ session("info") }}
         </div>
      @endif

         <div class="card mb-2 border-primary">
            <div class="card-body">
               <h3>{{ $article->title }}</h3>
                  <div>
                     <b class="text-success">
                        {{ $article->user->name }}
                    </b>,
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

                  @can('delete-article', $article)
                     <a href="{{ url("/articles/delete/$article->id")}}" class="btn btn-outline-danger">
                     Delete
                  </a>
                  @endcan
                  <a href="{{ url("/articles/edit/$article->id")}}" class="btn btn-outline-primary">
                     Edit
                  </a>
            </div>
         </div>

         <ul class="list-group mt-4">
            <li class="list-group-item active">
               Comments ({{ count($article->comments) }})
            </li>
            @foreach ($article->comments as $comment)
               <li class="list-group-item">
                  @can('delete-comment', $comment)
                     <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>
                  @endcan

                  <b class="text-success">
                     {{ $comment->user->name}}
                  </b>,
                  {{ $comment->content }}
               </li>
            @endforeach
         </ul>

         @auth
            <form action="{{ url("/comments/add") }}" method="post">
               @csrf
               <input type="hidden" name="article_id" value="{{ $article->id }}">
               <textarea name="content" class="form-control my-2"></textarea>
               <button class="btn btn-secondary">Add Comment</button>
            </form>
         @endauth
    </div>
@endsection