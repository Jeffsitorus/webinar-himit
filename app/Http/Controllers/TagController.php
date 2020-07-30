<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $tags = Tag::latest()->get();
        return view('tags.index')->with([
            'tags' => $tags,
            'title' => 'All Tags'
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);

        Tag::create($input);
        session()->flash('status', 'Tag berhasil dibuat');
        return redirect()->to(route('tags.index'));
    }

    public function show(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 'publish')->with(['user', 'tags', 'category'])->paginate(3);
        return view('home')->with([
            'posts' => $posts,
            'tag' => $tag,
            'title' => $tag->name,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $input = $request->all();

        $tag->update($input);
        session()->flash('status', 'Tag ' . $tag->name .  ' berhasil diubah');
        return redirect()->to(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('status', 'Tag ' . $tag->name . ' berhasil dihapus');
        return redirect()->to(route('tags.index'));
    }
}
