<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $postsCount=auth()->user()->articles()->count();

        // $articles=auth()->user()->articles;

        $articles=Article::with('category')->inRandomOrder()->take(15)->get();

        return view('web.website.main.index', compact('postsCount', 'articles'));
    }
}
