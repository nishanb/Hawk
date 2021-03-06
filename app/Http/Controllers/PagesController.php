<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      if (!auth()->check()) {
          return view('user.pages.about');
      }
        return redirect("/dashboard");
    }

    public function about(){
        return view('user.pages.about');
    }

}
