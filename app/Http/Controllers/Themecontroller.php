<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class Themecontroller extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(4);
        return view('Theme.index', compact('blogs'));
    }
    public function category($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return back();
        }

        $categoryName = $category->name;

        // $category_id=Category::where('name',$name)->first()->id;                  
        $blogs = Blog::where('category_id', $id)->paginate(8);

        return view('Theme.category', compact('blogs', 'categoryName'));
    }

    public function contact()
    {
        return view('Theme.contact');
    }

    public function blog($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('Theme.blog', compact('blog'));
    }
    public function login()
    {
        return view('Theme.auth.login');
    }
    public function register()
    {
        return view('Theme.auth.register');
    }
}
