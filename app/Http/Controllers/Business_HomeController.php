<?php

namespace App\Http\Controllers;

use App\Models\Business_Post;
use App\Models\Category;
use Illuminate\Http\Request;

class Business_HomeController extends Controller
{
    //PA2
    public function index()
    {
        $business_posts = Business_Post::latest()->take(4)->get();
        $categories = Category::all();
        return view('home.index_business',
            [
                'business_posts' => $business_posts,
                'categories' => $categories
            ]);
    }
}
