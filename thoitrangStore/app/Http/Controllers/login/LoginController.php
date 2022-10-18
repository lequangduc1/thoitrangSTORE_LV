<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function getLogin(){
        return view('adminPages.dashboard.index');
    }
}
