<?php

namespace App\Http\Controllers;

use Session;

use App\Setting;

use Illuminate\Http\Request;

class SettingsController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }

    public function index()
    {
      return view('admin.settings.settings')->with('settings',Setting::first());
    }

    public function update(){
      $this->validate(request(),[
        'site_name' =>'required',
        'contact_info' => 'required'
      ]);
      $settings = Setting::first();
      $settings->site_name = request()->site_name;
      $settings->contact_info = request()->contact_info;
      $settings->save();
      Session::flash('success','Site settings updated');
      return redirect()->back();
    }
}
