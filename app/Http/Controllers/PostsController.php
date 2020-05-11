<?php

namespace App\Http\Controllers;


use Session;

use App\Tag;
use App\Post;

use App\Category;

use Illuminate\Support\Str;


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
        return View('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories= Category::all();

      if($categories->count()==0){
        Session::flash('info', 'you must have at least one category to create a new post');
        return redirect()->back();
      }


        return view('admin.posts.create')->with('categories', $categories)->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
          'title' => 'required|max:255',
          'image' =>'required|image',
          'content' =>'required',
          'category_id' =>'required'


        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/posts', $image_new_name);

        $post = Post::create([
          'title' => $request->title,
          'content' => $request->content,
          'image' => 'uploads/posts/' . $image_new_name,
          'category_id' => $request->category_id,
          'slug' => str::slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully.');

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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post)
                                       ->with('categories',Category::all())
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

        $this->validate($request,[
          'title'=>'required',
          'content'=>'required',
          'category_id'=>'required',

        ]);

        $post = Post::find($id);

        if($request->hasFile('image'))
        {
          $image = $request->image;
          $image_new_name = time() . $image->getClientOriginalName();
          $image->move('uploads/posts',$image_new_name);

          $post->image= 'uploads/posts/'.$image_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        $post->tags()->sync($request->$tags);

        session::flash('success','Post successfully updated');

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

        session::flash('success', 'The post was just trashed');

        return redirect()->back();
    }

    public function trashed()
    {
      $posts = Post::onlyTrashed()->get();
      return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->forceDelete();
      session::flash('success', 'Post permanently deleted.');

      return redirect()->back();
    }

    public function restore($id)
    {
      $post= Post::withTrashed()->where('id',$id)->first();
      $post->restore();

      session::flash('success','Post restored successfully');

      return redirect()->back();
    }
}
