<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index')->with([
            'categories' => $categories,
            'title' => 'All Categories'
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);

        Category::create($input);
        session()->flash('status', 'Kategori berhasil dibuat');
        return redirect()->to(route('categories.index'));
    }

    public function show(Category $category)
    {
        $posts = $category->posts()->where('status', 'publish')->with('user', 'category')->latest()->paginate(3);
        return view('home')->with([
            'posts' => $posts,
            'category' => $category,
            'title' => $category->name,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $input = $request->all();

        $category->update($input);
        session()->flash('status', 'Kategori ' . $category->name .  ' berhasil diubah');
        return redirect()->to(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status', 'Kategori ' . $category->name . ' berhasil dihapus');
        return redirect()->to(route('categories.index'));
    }
}
