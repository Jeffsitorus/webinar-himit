@extends('layouts.apps')

@section('content')
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center justify-content-between">
              <div class="col">
                <h3 class="mb-0">Data Kategori</h3>
              </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"></i> Tambah Kategori
                </button>
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
                  <th scope="col">Category Name</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <th>{{ $category->name }}</th>
                  <th>{{ $category->slug }}</th>
                  <td width="15%">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCategory-{{$category->slug}}">
                      <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-notification-{{ $category->slug }}"><i class="fas fa-trash-alt"></i> Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<!-- include modal create,edit,delete -->
@include('categories.partials.modal')