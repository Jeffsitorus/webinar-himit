<div class="form-group row">
  <label for="title" class="col-md-2 col-form-label form-control-label">Judul Post</label>
  <div class="col-md-10">
    <input class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" placeholder="Judul post" type="text" id="title">
    @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="category" class="col-md-2 col-form-label form-control-label">Kategori</label>
  <div class="col-md-10">
    <select name="category" id="category" class="form-control">
      <option selected disabled>Choose One!</option>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}"{{ $post->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
      @endforeach
    </select>
    @error('category')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="tags" class="col-md-2 col-form-label form-control-label">Tag</label>
  <div class="col-md-10">
    <select name="tags[]" id="tags" class="form-control select2" multiple>
      @foreach ($post->tags as $tag)
        <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
      @endforeach
      @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
      @endforeach
    </select>
    @error('tags')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="status" class="col-md-2 col-form-label form-control-label">Status</label>
  <div class="col-md-10">
    <select name="status" id="status" class="form-control">
      <option selected disabled>Choose One!</option>
      <option value="publish"{{ $post->status == 'publish' ? 'selected' : ''}}>Publikasikan</option>
      <option value="draft"{{ $post->status == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draft</option>
    </select>
    @error('status')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="content" class="col-md-2 col-form-label form-control-label">Deskripsi</label>
  <div class="col-md-10">
    <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $post->content) }}</textarea>
    @error('content')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="published_at" class="col-md-2 col-form-label form-control-label">Tanggal Post</label>
  <div class="col-md-10">
    <input type="date" name="published_at" value="{{ old('published_at', $post->published_at) }}" id="published_at" class="form-control">
    @error('published_at')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="thumbnail" class="col-md-2 col-form-label form-control-label">Upload Gambar</label>
  <div class="col-md-10">
    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
    @error('thumbnail')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="form-group row">
  <div class="col-md-2"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
  </div>
</div>