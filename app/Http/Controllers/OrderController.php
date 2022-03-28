<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::id();

        $posts =
            DB::table('orders')
                ->join('posts', 'orders.post_id', '=', 'posts.id')
                ->select('orders.id', 'posts.title')->where('posts.user_id', '=', $user)
                ->get();

        $orders = DB::table('orders')
            ->join('posts', 'orders.post_id', '=', 'posts.id')
            ->select('orders.id', 'posts.title')
            ->where('orders.user_id', '=', $user)
            ->get();

        return view('orders.index', [
            'orders' => $orders,
            'posts' => $posts
        ]);
    }

    public function create($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('orders.create', compact('post'));
    }

    public function view($id)
    {
        $order = Order::findOrFail($id);
        $post = Post::findOrFail($order->service);
        return view('orders.create', [
            'order' => $order,
            'post' => $post
        ]);
    }

    public function store(Request $request, $data)
    {
        $post = Post::where('slug', $data)->first();
        $order = new Order();
        $order->user_id = Auth::id();
        $order->post_id = $post->id;
        $order->requirement = $request->input('requirements');
        $order->save();

        return redirect(route('home'));
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
