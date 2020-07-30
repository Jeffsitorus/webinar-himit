@extends('layouts.app')

@section('content')
<div class="container my-3">
  <div class="d-flex justify-content-between">
    <h4>{{$post->title}}</h4>
    <form action="{{ route('search.post') }}" method="GET" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card mb-3 shadow-sm">
        @if ($post->thumbnail)
          <img src="{{ $post->TakeImage }}" style="height: 450px; object-fit:cover; object-position:center;" class="rounded" alt="">
        @endif
        <div class="card-body">
          <h4>{{$post->title}}</h4>

            <div class="text-muted text-small">Category : <a href="/categories/{{$post->category->slug}}" class="badge badge-primary">{{$post->category->name}}</a> 
              <b>&middot;</b> 
              @foreach ($post->tags as $tag)
                <a href="{{ route('tags.show', $tag->slug) }}" class="badge badge-secondary">
                  <small>{{ $tag->name }}</small>
                </a>
              @endforeach 
            <b>&middot;</b>{{$post->created_at->format('d F, Y')}}
            </div>
            
            <div class="media my-3 align-items-center">
              <img src="{{ $post->user->gravatar() }}" class="rounded-circle mr-3" width="45">
              <div class="media-body">
                <small>{{ $post->user->name }}</small>
              </div>
            </div>
          <hr>
          <p>{!! $post->content !!}</p>
          <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary"> Back Home</a>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-4">
      @forelse ($posts as $post)    
        <div class="card mb-3 shadow-sm">
          <div class="card-body">
            <a href="{{ route('categories.show', $post->category->slug) }}" class="badge badge-primary">
              {{ ucfirst($post->category->name) }}
            </a>
            &middot;

            @foreach ($post->tags as $tag)
            <a href="{{ route('tags.show', $tag->slug) }}" class="badge badge-secondary">
              <small>{{ $tag->name }}</small>
            </a>
            @endforeach

            <div class="card-title mt-2">
              <h5>
                <a class="text-dark" href="{{ route('posts.show', $post->slug) }}">
                  <h6>{{$post->title}}</h6>
                </a>
              </h5>
            </div>

            <div class="my-3 text-secondary">
              <small>{!! Str::limit($post->content,150) !!}</small>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-2">
              <div class="media align-items-center">
                <img src="{{ $post->user->gravatar() }}" class="rounded-circle mr-3" width="35" alt="">
                <div class="media-body">
                  <div class="text-secondary">
                    {{ $post->user->name }}
                  </div>
                </div>
              </div>
              <small class="text-muted">{{$post->created_at->format('d F, Y')}}</small>
            </div>
    
          </div>
        </div>
      @empty
        <div class="col-md-6">
          <div class="alert alert-danger">
            Tidak ditemukan, Data Tidak Tersedia.
          </div>
        </div>
      @endforelse
      {{ $posts->links() }}
    </div>

  </div>
</div>
@endsection