@extends('layouts.app')
@section('title', 'Pagrindinis')
@section('content')
    <section class="courses-area pt-100 pb-70">
        <div class="container">
            <div class="py-6 px-10">
                <h3 class="text-3xl leading-6 font-medium text-gray-900">Posts</h3>
            </div>
        <!--<div class="px-4">
                <button class="filter" data-filter="all">All ({{count($posts)}})</button>
                @foreach($categories as $category)
            @if($category->parent_id == NULL)
                <button class="filter" data-filter=".{{$category->slug}}">{{$category->name}}
                    ({{App\Models\Post::where('category', $category->id)->count()}})
                    </button>
                    @endif
        @endforeach
            </div>-->
            <div class="shorting">
                <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
                    @if(Count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="border rounded-lg overflow-hidden shadow-lg">
                                <div class="{{\App\Models\Category::find($post->category)->slug}}">
                                    <div class="">
                                        <a href="{{ route('posts.show', [$post->slug]) }}" class="d-block"><img
                                                src="{{$post->img}}" alt="image"
                                                class="lg:h-72 md:h-48 w-full object-cover object-center"></a>
                                        <div class="py-4">
                                            <div>
                                                <h3 class="flex justify-center"><a
                                                        href="{{ route('posts.show', [$post->slug]) }}"
                                                        class="py-2 text-md font-bold leading-7 text-gray-900 sm:text-xl sm:truncate">{{$post->title}}</a>
                                                </h3>
                                            </div>
                                            <div class="px-2">
                                                <div class="flex justify-center">
                                                <!--<img src="{{App\Models\User::find($post->user_id)->photo}}" class="shadow" alt="image">-->
                                                    <span
                                                        style="font-style: italic">{{App\Models\User::find($post->user_id)->name}}</span>
                                                </div>
                                                <div class="flex justify-center">
                                                    @if(App\Models\Rating::where('post_id', $post->id)->exists())
                                                        <div class="flex">
                                                            <h1 class="px-1">{{\App\Http\Helpers::getRating($post->id)}}</h1>
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="w-6 h-6 text-yellow-300 fill-current hover:text-yellow-400"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                            >
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                                                />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="break-words">{{substr($post->content,0,100)}}...</p>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="price text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate px-2">
                                                    {{$post->price}} &euro;</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{__('posts.none')}}
                    @endif
                </div>
            </div>
            <div>
                <div class="py-4 px-10">
                    <h3 class="text-3xl leading-6 font-medium text-gray-900">Explore</h3>
                </div>
                <ul class="categories-list grid grid-cols-3 py-4 gap-4">
                    <li>
                        <a class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span>Video & Animation</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-fuchsia-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                            <span>Music & Audio</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <span>Graphics & Design</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Programming & Tech</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span> Lifestyle</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                            <span>Data</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
