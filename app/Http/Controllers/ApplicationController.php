<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Business_Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    //PA17
    public function index()
    {
        $user = Auth::id();
        $business_posts = Business_Post::where('user_id', $user)->get();
        $applications = Application::all();
        return view('applications.index', ['applications'=> $applications, 'business_posts'=> $business_posts,]);
    }
    //PA6
    public function create(string $slug)
    {
        $business_post = Business_Post::where('slug', $slug)->first();
        return view('applications.create', compact('business_post'));
    }
    //PA6
    public function store(Request $request,string $slug)
    {
        $business_post = Business_Post::where('slug', $slug)->first();
        $application = new Application();
        $application->user_id = Auth::id();
        $application->business_post_id = $business_post->id;
        $application->phone = $request->input('phone');
        $validated = $request->validate([
            'cv' => 'required|file|max:5000|mimes:pdf,docx,doc',
        ]);
        //$file = $validated['cv'];
        $file = $request->file('cv');
        $destinationPath = 'assets/files/business_posts';
        $file->move($destinationPath, $file->getClientOriginalName());
        $cv = '/'.$destinationPath.'/'.$file->getClientOriginalName();
        $application->cv = $cv;
        $application->save();

        return redirect()->route('business_home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
