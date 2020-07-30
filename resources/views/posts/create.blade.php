@extends('layouts.apps')

@section('content')
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Tambah Post Baru</h3>
              </div>
              <div class="col text-right">
                <a href="{{ route('posts.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-xl-9">
              <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @include('posts.partials.form')
                
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
