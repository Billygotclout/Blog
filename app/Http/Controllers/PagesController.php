<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index(){
      if (auth()->user()) {
        return view('home');
      }
    return view('pages.index');
   }
   public function about(){
    return view('pages.about');
   }
  
}
