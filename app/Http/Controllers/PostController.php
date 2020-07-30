<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $posts = Post::with(['category', 'tags', 'user'])->latest()->paginate(5);
        return view('posts.index')->with([
            'posts' => $posts,
            'title' => 'All Post'
        ]);
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('posts.create')->with([
            'categories' => $categories,
            'post' => new \App\Post,
            'tags' => $tags,
            'title' => 'Create New Post'
        ]);
    }

    public function store(PostRequest $request)
    {
        $input = $request->all();

        $slug = Str::slug($request->title);
        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images", "public") : null;
        $input['category_id'] = $request->category;
        $input['slug'] = $slug;
        $input['thumbnail'] = $thumbnail;

        $post = auth()->user()->posts()->create($input);

        $post->tags()->attach(request('tags'));
        session()->flash('status', 'Post berhasil dibuat!');
        return redirect()->to(route('posts.index'));
    }

    public function show(Post $post)
    {
        $posts = Post::where('status', 'publish')->with(['user', 'tags', 'category'])->where('category_id', $post->category_id)->paginate(3);
        return view('posts.show')->with([
            'post' => $post,
            'posts' => $posts,
            'title' => $post->title,
        ]);
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('posts.edit')->with([
            'categories' => $categories,
            'post' => $post,
            'tags' => $tags,
            'title' => 'Edit Post'
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        if (request()->file('thumbnail')) {
            Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images", "public");
        } else {
            $thumbnail = $post->thumbnail;
        }

        $input['category_id'] = $request->category;
        $input['thumbnail'] = $thumbnail;
        $post->update($input);
        $post->tags()->sync(request('tags'));
        session()->flash('status', 'Post berhasil diupdate!');
        return redirect()->to(route('posts.index'));
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->thumbnail);
        $post->delete();
        $post->tags()->detach();
        session()->flash('status', 'Post berhasil dihapus!');
        return redirect()->to(route('posts.index'));
    }
}
