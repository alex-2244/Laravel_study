<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
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
    
    return view('admin.posts.create')->with('categories', $category)
                                     ->with('tags', Tag::all());
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
    
    //VALIDATING THE FORM FOR THE EMPTY FIELD
    $this->validate($request, [
        'title' => 'required|max:225',
        'featured' => 'required|image',
        'content'  => 'required',
        'category_id' => 'required',
        'tags' => 'required'
    ]);

    // dd($request->all());
    

    //THIS METHOD IS USED TO GET THE ORIGINAL NAME OF THE IMAGE BECAUSE SOMEONE CAN RENAME THE IMAGE TO PREVENTFROM THAT WE DOING THIS METHOD
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

    $post->tags()->attach($request->tags);

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
      // dd($id);

        $post = Post::find($id);

        return view('admin.posts.edit')->with('posts', $post)
                                        ->with('categories', Category::all())
                                        ->with('tags', Tag::all());
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
      $this->validate($request, [
          'title' => 'required',
          'content' => 'required',
          'category_id' => 'required',
      ]);

      $post = Post::find($id);
      

      /*
      this check the image is already present or not 
      if present then update the other content or 
      if you want to add new image you can choose new one
      */

      if ($request->hasFile('featured')) {

          $featured = $request->featured;

          $featured_new_name = time() . $featured->getClientOriginalName();

          $featured->move('uploads/loadimage', $featured_new_name);

          $post->featured = 'uploads/loadimage/'.$featured_new_name;

      }

      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category_id;

      $post->save();


      //sync all the tags which has been checked and if needed can choose the other tags or u can deselect
      $post->tags()->sync($request->tags);

      Session::flash('success', 'Post updated successfully');

      return redirect()->route('posts');



  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function destroy($id)
  {
      $post = Post::find($id);

      $post->delete();

      Session::flash('success', 'Your post was just trashed');

      return redirect()->back();
  }

  //deleted data will be moved to trashed not deleted permanently 
  public function trashed() {
      $posts = Post::onlyTrashed()->get();

      // dd($posts);

      return view('admin.posts.trashed')->with('posts', $posts);
  }

  //THIS IS TO DELETE THE DATA ON DB WHICH WILL BE DELETED PERMANENTLY
  public function kill($id)
  {
      $post = Post::withTrashed()->where('id', $id)->first();
      // dd($post);
      
      $post->forceDelete();

      Session::flash('success', 'Post deleted permanently');

      return redirect()->back();
  }

  //THIS WILL RESTORE THE TRASHED DATA
  public function restore($id)
  {
      $post = Post::withTrashed()->where('id', $id)->first();

      $post->restore();

      Session::flash('info', 'Restored successfully...!!!');

      return redirect()->route('posts');
  }






}//MAIN CONTROLLER ENDS
