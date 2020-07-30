<?php

namespace App\Http\Controllers;

use App\Post;

class SearchController extends Controller
{
    public function post()
    {
        $query = request('query');
        $posts = Post::with(['user', 'tags', 'category'])->where("title", "like", "%$query%")->paginate(3);
        return view('home', compact('posts'));
    }
}
