<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Business_Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        //
    }

    public function create(string $slug)
    {
        $business_post = Business_Post::where('slug', $slug)->first();
        return view('applications.create', compact('business_post'));
    }

    public function store(Request $request,string $slug)
    {
        $business_post = Business_Post::where('slug', $slug)->first();
        $application = new Application();
        $application->user_id = Auth::id();
        $application->business_post_id = $business_post->id;
        $application->phone = $request->input('phone');
        $file = $request->file('cv');
        $destinationPath = 'assets/files/business_posts';
        $file->move($destinationPath, $file->getClientOriginalName());
        $cv = '/'.$destinationPath.'/'.$file->getClientOriginalName();
        $application->cv = $cv;
        $application->save();

        // Redirect the user to the created post with a success notification
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
