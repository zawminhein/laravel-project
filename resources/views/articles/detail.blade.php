@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

         <div class="card mb-2 border-primary">
            <div class="card-body">
               <h3>{{ $article->title }}</h3>
                  <div>
                     <small class="text-muted">
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
    </div>
@endsection