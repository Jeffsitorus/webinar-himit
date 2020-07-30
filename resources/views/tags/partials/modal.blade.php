{{-- Create tag --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tag Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tags.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name" class="form-label">Nama Tag</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nama Tag" value="{{ old('name') }}" required>
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

{{-- Edit tag --}}
@foreach ($tags as $tag)
<div class="modal fade" id="editTag-{{ $tag->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tag {{ $tag->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tags.update', $tag->slug) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="name" class="form-label">Nama Tag</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nama Tag" value="{{ old('name', $tag->name) }}" required>
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
@foreach ($tags as $tag)
<div class="modal fade" id="modal-notification-{{ $tag->slug }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
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
          <p>Data Tag {{ $tag->name }}.</p>
          <form action="{{ route('tags.destroy', $tag->slug) }}" method="post">
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