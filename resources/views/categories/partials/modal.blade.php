{{-- Create Category --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name" class="form-label">Nama Kategori</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nama kategori" value="{{ old('name') }}" required>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- end --}}

{{-- Edit Category --}}
@foreach ($categories as $category)
<div class="modal fade" id="editCategory-{{ $category->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category {{ $category->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('categories.update', $category->slug) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="name" class="form-label">Nama Kategori</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori" value="{{ old('name', $category->name) }}" required>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
{{-- end --}}

{{-- modal delete --}}
@foreach ($categories as $category)
<div class="modal fade" id="modal-notification-{{ $category->slug }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
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
          <p>Data Kategori {{ $category->name }}</p>
          <form action="{{ route('categories.destroy', $category->slug) }}" method="post">
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