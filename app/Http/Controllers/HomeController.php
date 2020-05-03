<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }


}
