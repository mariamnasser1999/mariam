<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['create']);
    // }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            return view('Theme.blogs.create');
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreBlogRequest $request)
    // {
    //     $data = $request->validated();

    //     // dd($request->all());

    //     // image uploading
    //     // 1-grt image

    //     $image = $request->image;

    //     //2-change it is current name
    //     $newImageName = time() . '-' . $image->getClientOriginalName();

    //     //3-move image to my project 

    //     $image->storeAs('blogs', $newImageName, 'public');

    //     $data['image'] = $newImageName;
    //     $data['user_id '] = Auth::user()->id;
    //     // dd($data);
    //     // // create new blog record
    //     Blog::create($data);
    //     return back()->with('blogCreateStatus', ' your blog create successfuly ');
    // }

    public function store(Request $request)
    {
        $blog = new Blog();
        if ($request->image) {
            $image = $request->image;
            $newImageName =  Str::uuid() . '.' . $image->extension();
            $image->storeAs('blogs', $newImageName, 'public');
            $blog->image = 'storage/blogs/' . $newImageName;
            // create new blog record
        }

        $blog->description =  $request->description;
        $blog->user_id =  Auth::user()->id;
        $blog->name = $request->name;
        $blog->category_id = $request->category_id;
        $blog->save();

        return back()->with('blogCreateStatus', ' your blog create successfuly ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::user() && $blog->user_id == Auth::user()->id) {

            $categories = Category::get();
            return view('Theme.blogs.edit', compact('categories', 'blog'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request,  $id)
    {
        $blog = Blog::find($id);

        if ($blog->user_id == Auth::user()->id) {

            if ($request->image) {
                Storage::delete("public/blogs/$blog->image");
                $image = $request->image;
                $newImageName =  Str::uuid() . '.' . $image->extension();
                $image->storeAs('blogs', $newImageName, 'public');
                $blog->image = 'storage/blogs/' . $newImageName;
            }
            // dd($request->all());


            // create new blog record
            $blog->user_id =  Auth::user()->id;
            $blog->name = $request->name;
            $blog->description =  $request->description;
            $blog->category_id = $request->category_id;
            $blog->save();

            return back()->with('blogUpdatestatus', ' your blog create successfuly ');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        if ($blog->user_id == Auth::user()->id) {
            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return back()->with('blogdeletestatus', ' your blog has been delete successfuly ');
        }
        abort(404);
    }

    public function myBlogs()
    {
        if (Auth::check()) {

            $blogs = Blog::where('user_id', Auth::user()->id)->paginate(4);
            return view('Theme.blogs.my-blogs', compact('blogs'));
        }
        abort(403);
    }
}
