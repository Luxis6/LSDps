<?php

namespace App\Http\Controllers;

use App\Http\Services\RatingsService;
use App\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vote(Request $request, $post)
    {
        $rs = new RatingsService();
        if ($rs->exists($post)) {
            if (!$rs->voted(Auth::id(), $post)) {
                $vote = $request->input('vote');
                $comment = $request->input('comment');
                $rating = new Rating();
                $rating->vote = $vote;
                $rating->user_id = Auth::id();
                $rating->comment = $comment;
                $rating->post_id = $post;
                $rating->save();

            }
        }
        return redirect()->back();
    }

    public static function show($post)
    {
        if (!Session::has('sort')) {
            Session::put('sort', '1');
        }

        $sort = Session::get('sort');
        $rts = null;
        //Pagal balsus
        if ($sort == 0) {
            $rts = Rating::where('post_id', $post)->orderBy('vote', 'desc')->get();
        } elseif ($sort == 1) { //Data
            $rts = Rating::where('post_id', $post)->orderBy('created_at', 'desc')->get();
        }

        return view('ratings.show', [
            'ratings' => $rts
        ]);
    }

    public function sort(Request $request)
    {
        $data = $request->input("sort");
        Session::forget("sort");
        Session::put("sort", $data);
        return redirect()->back();
    }

    public function remove($id): RedirectResponse
    {
        $vote = Rating::findOrFail($id);
        if (!$vote->user == Auth::id()) {
            return redirect()->back();
        }

        $vote->delete();
        return redirect()->back();
    }
}
