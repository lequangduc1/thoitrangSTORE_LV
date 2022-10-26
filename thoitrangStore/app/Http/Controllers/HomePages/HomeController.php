<?php

namespace App\Http\Controllers\HomePages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home(){
       return view('homePages.home.index');
   }
}
