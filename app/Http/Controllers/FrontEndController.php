<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
    $firstpost = Post::orderBy('created_at','desc')->skip(0)->take(1)->get()->first();
    $posts = Post::orderBy('created_at','desc')->skip(1)->take(2)->get();

      return view('index')
              ->with('title',Setting::first()->site_name)
              ->with('posts',$posts)
              ->with('firstpost',$firstpost)
              ->with('categories',Category::all());

    }

    public function category($id)
    {
      $category = Category::find($id);
      return view('category')
            ->with('title',Setting::first()->site_name)
            ->with('category',$category)
            ->with('categories',Category::all());

    }
}
