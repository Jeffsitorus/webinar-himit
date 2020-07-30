<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $posts = Post::where('status', 'publish')->with('user', 'tags', 'category')->latest()->paginate(3);
        return view('home')->with([
            'categories' => $categories,
            'posts' => $posts,
            'title' => 'Daftar Post'
        ]);
    }
}
