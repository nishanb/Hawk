<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function index(){
      return view('admin.pages.index');
  }

  public function posts(){
      return view('admin.pages.posts');
  }

  public function post($id){
      return view('admin.pages.post');
  }

  public function users($id){
      return view('admin.pages.users');
  }

  public function comments($id){
      return view('admin.pages.comments');
  }

}
