<?php

namespace App\Http\Controllers;

use App\Http\Services\RatingsService;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // Get all Posts, ordered by the newest first
        $posts = Post::where('user_id',Auth::id())->get();

        // Pass Post Collection to view
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Show create post for
        $categories = Category::all();
        return view('posts.create', ['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        // Validate posted form data
        $validated = $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'content' => 'required|string|min:5|max:2000',
            'category' => 'required|string|max:30',
            'price' => 'required|numeric|max:10000',
            'img' => 'required|file|mimes:jpeg,jpg,bmp,png,gif,svg'
        ]);

        $file = $request->file('img');
        $destinationPath = 'assets/img/posts';
        $file->move($destinationPath, $file->getClientOriginalName());
        $img = '/'.$destinationPath.'/'.$file->getClientOriginalName();
        $validated['img'] = $img;

        // Create slug from title
        $validated['slug'] = Str::slug($validated['title'], '-');
        $validated['user_id'] = Auth::id();

        // Create and save post with validated data
        $post = Post::create($validated);

        // Redirect the user to the created post with a success notification
        return redirect(route('posts.show', [$post->slug]))->with('notification', 'Post created!');
    }

    public function show($post)
    {
        $post = Post::where('slug', $post)->first();
        $categories = Category::all();
        if (!$post) {
            abort(404);
        }
        $rate = RatingsService::overall($post->id);
        // Pass current post to view
        return view('posts.show', [
            'post' => $post,
            'rate' => $rate,
            'categories' => $categories
        ]);
    }
    public function indexByCategory($main_slug,$slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category', $category->id)->get();
        return view('posts.category.index', compact('posts'), ['category' => $category]);
    }

    public function edit($post)
    {
        $post = Post::where('slug', $post)->first();
        if ($post->user_id == Auth::id()) {
            $categories = Category::all();
            return view('posts.edit', [
                'post' => $post,
                'categories' => $categories
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $post)
    {
        $post = Post::where('slug', $post)->first();
        if ($post->user_id == Auth::id()) {
            // Validate posted form data
            $validated = $request->validate([
                'title' => 'required|string|min:5|max:100',
                'content' => 'required|string|min:5|max:2000',
                'category' => 'required|string|max:30',
                'price' => 'required|numeric|max:10000'
            ]);

            if ($request->file('img') !== null) {
                $validatedImage = $request->validate([
                    'img' => 'file|mimes:jpeg,bmp,png,gif,svg'
                ]);
                $file = $validatedImage['img'];
                $destinationPath = 'assets/img/posts';
                $file->move($destinationPath, $file->getClientOriginalName());
                $img = '/'.$destinationPath.'/'.$file->getClientOriginalName();
                $post->update([
                    'img' => $img
                ]);
            }

            // Create slug from title
            $validated['slug'] = Str::slug($validated['title'], '-');

            // Update Post with validated data
            $post->update($validated);

            // Redirect the user to the created post woth an updated notification
            return redirect(route('posts.show', [$post->slug]))->with('notification', 'Post updated!');
        } else {
            return redirect()->back();
        }
    }

    public function destroy($post)
    {
        $post = Post::where('slug', $post)->first();
        if ($post->user_id == Auth::id()) {
            // Delete the specified Post
            $post->delete();
            $rs = new RatingsService();
            $rs->RemoveAll($post->id);

            // Redirect user with a deleted notification
            return redirect(route('home'));
        } else {
            return redirect()->back();
        }
    }
}
