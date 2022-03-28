<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(4)->get();
        $categories = Category::all();
        return view('home.index',
            [
                'posts' => $posts,
                'categories' => $categories
            ]);
    }
}
