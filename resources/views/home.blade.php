@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-between">
      <div class="col-lg-6">
        @isset($category)
        <h4>Category : {{$category->name}}</h4>
        @endisset
  
        @isset($tag)
        <h4>Tags : {{ $tag->name }}</h4>
        @endisset
  
        @if (!isset($category) and !isset($tag))
          <h2>Daftar Post</h2>
        @endif
      </div>
      <div class="col-lg-6">
        <div class="float-right">
          <form action="{{ route('search.post') }}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-7">
        @forelse ($posts as $post)    
          <div class="card mb-3 shadow-sm">
            @if ($post->thumbnail)
            <a href="{{ route('posts.show', $post->slug) }}">
              <img style="height: 350px; object-fit:cover; object-position:center;" src="{{ $post->TakeImage }}" class="card-img-top">
            </a>
            @endif
            <div class="card-body">
              
              <div class="my-2">
                <a href="{{ route('categories.show', $post->category->slug) }}" class="badge badge-primary">
                  <small>{{ ucfirst($post->category->name) }}</small>
                </a>
                &middot;
                @foreach ($post->tags as $tag)
                <a href="{{ route('tags.show', $tag->slug) }}" class="badge badge-secondary">
                  <small>{{ $tag->name }}</small>
                </a>
                @endforeach
              </div>

              <div class="card-title">
                <h5>
                  <a class="text-dark" href="{{ route('posts.show', $post->slug) }}">
                    {{$post->title}}
                  </a>
                </h5>
              </div>

              <div class="my-3 text-secondary">
                {!! Str::limit($post->content,200) !!}
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
                <div class="text-secondary">
                  <small>
                    Diposting {{ $post->created_at->diffForHumans() }} <b>&middot;</b> {{ $post->created_at->format('d F, Y') }}
                  </small>
                </div>
              </div>
      
            </div>
          </div>
        @empty
        <div class="row">
          <div class="col-md-8">
            <div class="alert alert-danger">
              Tidak ditemukan, Data Tidak Tersedia.
            </div>
          </div>
        </div>
        @endforelse
      </div>

      <div class="col-md-5">
        @foreach ($posts as $post)
          <div class="card mb-3 shadow-sm" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-5">
                <a href="{{ route('posts.show', $post->slug) }}">
                  <img src="{{ $post->TakeImage }}" style="height:100%; object-fit:cover; object-position:center;" class="card-img" alt="Image">
                </a>
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <a href="{{ route('posts.show', $post->slug) }}">
                    <h6 class="card-title">{{ $post->title }}</h6>
                  </a>
                    <a href="{{ route('categories.show', $post->category->slug) }}" class="badge badge-primary">
                    {{ ucfirst($post->category->name) }}
                    </a>
                    @foreach ($post->tags as $tag)
                      <a href="{{ route('tags.show', $tag->slug) }}" class="badge badge-secondary">
                        {{ ucfirst($tag->name) }}
                      </a>
                    @endforeach
                  <small><p class="card-text text-muted mt-2">{{ $post->created_at->format('d F, Y') }}</p></small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      
      </div>
      
    </div>

    {{ $posts->links() }}

  </div>
@endsection
