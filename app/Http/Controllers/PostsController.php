<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Session;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $image = DB::table('posts')->get()->featured();
        // return view('admin.posts.index')->with('posts', $image);
        return view('admin.posts.index')->with('posts', Post::all());
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // this is to attempting to create new post before creating the category, this will protect to move onto post before creating category
        $category = Category::all();

        if ($category->count() == 0) {
            
            Session::flash('error', 'You must have some category before attempting to create post');
            return redirect()->back();

        }
        
        return view('admin.posts.create')->with('categories', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title'    => 'required|max:225',
            'featured' => 'required|image',
            'content'  => 'required',
            'category_id' => 'required'
        ]);

        // dd($request->all());

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/loadimage', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/loadimage/' . $featured_new_name,
            'category_id' => $request->category_id,
            //slug is to display the words with '-' between each word(Create New Project = create-new-project)and it will be shown lowercase
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Post created successfully');
        
        // dd($request->all());
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function trashed() {
        $posts = Post::onlyTrashed()->get();

        // dd($posts);

        return view('admin.posts.trashed')->with('posts', $posts);
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Your post was just trashed');

        return redirect()->back();
    }
}
