<?php

namespace App\Http\Controllers;

use App\Models\Business_Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Business_PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    //PA13
    public function index()
    {
        // Get all Posts, ordered by the newest first
        $business_posts = Business_Post::where('user_id',Auth::id())->get();

        // Pass Post Collection to view
        return view('business_posts.index', compact('business_posts'));
    }
    //PA2
    public function indexByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $business_posts = Business_Post::where('category', $category->id)->get();
        return view('business_posts.category.index', compact('business_posts'), ['category' => $category]);
    }
    //PA14
    public function create()
    {
        $categories = Category::all();
        return view('business_posts.create', ['categories'=>$categories]);
    }

    //PA14
    public function store(Request $request)
    {
        // Validate posted form data
        $validated = $request->validate([
            'title' => 'required|string|unique:business_posts|min:5|max:100',
            'category' => 'required|string|max:30',
            'job_content' => 'required|string|min:5|max:2000',
            'job_requirements' => 'required|string|min:5|max:2000',
            'job_offer' => 'required|string|min:5|max:2000',
            'job_salary' => 'required|string|min:5|max:2000',
            'job_type' => 'required|string|max:30',
            'business_link' => 'required|string|max:30',
            'city' => 'required|string|max:100',
        ]);

        // Create slug from title
        $validated['slug'] = Str::slug($validated['title'], '-');
        $validated['user_id'] = Auth::id();

        // Create and save post with validated data
        $business_post = Business_Post::create($validated);

        // Redirect the user to the created post with a success notification
        return redirect(route('business_posts.show', [$business_post->slug]))->with('notification', 'Post created!');
    }

    //PA15
    public function show($business_post)
    {
        $business_post = Business_Post::where('slug', $business_post)->first();
        $categories = Category::all();
        if (!$business_post) {
            abort(404);
        }
        if($business_post->user_id != Auth::id()) {
            $business_post->increment('clicks');
        }
        return view('business_posts.show', [
            'business_post' => $business_post,
            'categories' => $categories
        ]);
    }


    /*public function edit($business_post)
    {
        $business_post = Business_Post::where('slug', $business_post)->first();
        if ($business_post->user_id == Auth::id()) {
            $categories = Category::all();
            return view('business_posts.edit', [
                'business_post' => $business_post,
                'categories' => $categories
            ]);
        } else {
            return redirect()->back();
        }
    }*/

    //PA16
    public function update(Request $request, $business_post)
    {
        $business_post = Business_Post::where('slug', $business_post)->first();
        if ($business_post->user_id == Auth::id()) {
            // Validate posted form data
            $validated = $request->validate([
                'title' => 'required|string|unique:posts|min:5|max:100',
                'category' => 'required|string|max:30',
                'job_content' => 'required|string|min:5|max:2000',
                'job_requirements' => 'required|string|min:5|max:2000',
                'job_offer' => 'required|string|min:5|max:2000',
                'job_salary' => 'required|string|min:5|max:2000',
                'job_type' => 'required|string|max:30',
                'business_link' => 'required|string|max:30',
                'city' => 'required|string|max:100',
            ]);

            // Create slug from title
            $validated['slug'] = Str::slug($validated['title'], '-');

            // Update Post with validated data
            $business_post->update($validated);

            // Redirect the user to the created post woth an updated notification
            return redirect(route('business_posts.show', [$business_post->slug]))->with('notification', 'Post updated!');
        } else {
            return redirect()->back();
        }
    }


    public function destroy($business_post)
    {
        $business_post = Business_Post::where('slug', $business_post)->first();
        if ($business_post->user_id == Auth::id()) {
            // Delete the specified Post
            $business_post->delete();
            // Redirect user with a deleted notification
            return redirect(route('home'));
        } else {
            return redirect()->back();
        }
    }
}
