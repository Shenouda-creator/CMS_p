<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke(){
        $userCount = \App\Models\User::count();
         $articleCount = \App\Models\Article::count();
         $categoryCount = \App\Models\Category::count();
        return view('web.dashboard.home.index', compact('userCount', 'articleCount', 'categoryCount'));
    }
}
