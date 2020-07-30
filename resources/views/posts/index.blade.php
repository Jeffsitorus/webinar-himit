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
                <h3 class="mb-0">Data Post</h3>
              </div>
              <div class="col text-right">
                <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Post</a>
              </div>
            </div>
          </div>

          <!-- Sweet-alert  -->
          <div class="flash-data" data-flashdata="{{ session()->get('status') }}"></div>
          <!-- end -->

          <div class="table-responsive">
            <table class="table align-items-center py-3">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Tags</th>
                  <th scope="col">Created By</th>
                  <th scope="col">Published at</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($posts as $post)
                <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <th>{{ $post->title }}</th>
                  <th>{{ $post->category->name }}</th>
                  <th>
                    @foreach ($post->tags as $tag)
                      <span class="badge badge-success badge-pill">{{ $tag->name }}</span>
                    @endforeach
                  </th>
                  <td>{{ $post->user->name }}</td>
                  <td>{{ $post->published_at }}</td>
                  <td>
                    @if ($post->status == 'publish')
                      <span class="badge badge-primary badge-pill">{{ $post->status }}</span>
                    @else
                      <span class="badge badge-danger badge-pill">{{ $post->status }}</span>
                    @endif
                  </td>
                  <td width="15%">
                    @can('update', $post)
                      <a href="{{ route('posts.edit',$post->slug) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    @endcan
                    @can('delete', $post)
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-notification-{{ $post->slug }}"><i class="fas fa-trash-alt"></i> Delete</button>
                    @endcan
                  </td>
                </tr>
                @empty
                <div class="row justify-content-center">
                  <div class="col-sm-6">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <span class="alert-text"><strong>Sorry!</strong> There's no posts.</span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div> 
                  </div>
                </div>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="container">
            <div class="d-flex justify-content-end align-items-end my-2">
              {{ $posts->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

{{-- modal delete --}}
@foreach ($posts as $post)
<div class="modal fade" id="modal-notification-{{ $post->slug }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-gradient-danger">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-notification">Notifikasi Hapus Data!</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="py-3 text-center">
          <i class="ni ni-bell-55 ni-3x"></i>
          <h4 class="heading mt-4">Apakah anda benar-benar ingin menghapusnya?</h4>
          <p>Data post {{ $post->title }}</p>
          <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
            @csrf
            @method('DELETE')
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-white">Ok, Hapus!</button>
          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
{{-- end modal --}}