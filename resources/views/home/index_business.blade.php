@extends('layouts.app_business')
@section('title', 'LSD Business -  Search For Job In a Company')
@section('content')
    <section class="courses-area pt-100 pb-70">
        <div class="container flex flex-col">
            <div class="py-6 px-10">
                <h1 class="text-3xl leading-6 font-medium text-gray-900">{{__('page.Latest Business Posts')}}</h1>
            </div>
            <div class="shorting">
                <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5 auto-cols-min ">
                    @if(Count($business_posts) > 0)
                        @foreach($business_posts as $business_post)
                            <div class="border rounded-lg overflow-hidden shadow-lg">
                                <div class="{{\App\Models\Category::find($business_post->category)->slug}}">
                                    <div class="">
                                        <a href="{{ route('business_posts.show', [$business_post->slug]) }}" class="d-block" target="_blank"></a>
                                        <div class="py-4">
                                            <div>
                                                <h3 class="flex justify-center"><a
                                                        href="{{ route('business_posts.show', [$business_post->slug]) }}"
                                                        class="py-2 text-md font-bold leading-7 text-gray-900 sm:text-xl break-words px-2"
                                                        target="_blank">{{$business_post->title}}</a>
                                                </h3>
                                            </div>
                                            <div>
                                                <h3 class="flex justify-center font-medium">
                                                    {{App\Models\Category::find($business_post->category)->name}}
                                                </h3>
                                            </div>
                                            <div class="px-2">
                                                <h3 class="flex justify-center">
                                                    {{App\Models\User::find($business_post->user_id)->name}}
                                                </h3>
                                            </div>
                                            <div>
                                                @if($business_post->job_type == 1)
                                                <h3 class="flex justify-center font-medium">
                                                    {{__('page.Internship')}}
                                                </h3>
                                                @elseif($business_post->job_type == 2)
                                                <h3 class="flex justify-center font-medium">
                                                    {{__('page.Part-Time')}}
                                                </h3>
                                                @elseif($business_post->job_type == 3)
                                                <h3 class="flex justify-center font-medium">
                                                    {{__('page.Full-Time')}}
                                                </h3>
                                                @endif
                                            </div>
                                            <div class="px-2 h-20" style="flex: 1 0 auto;">
                                                <h3 class="flex justify-end font-bold">
                                                    {{$business_post->job_salary}}
                                                </h3>
                                            </div>
                                            <div class="flex justify-end px-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <span class="font-medium">{{$business_post->clicks}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="font-bold text-xl">{{__('page.No posts yet')}}</h2>
                    @endif
                </div>
            </div>
            <div class="inset-x-0 bottom-0">
                <div class="py-4 px-10">
                    <h1 class="text-3xl leading-6 font-medium text-gray-900">{{__('page.Explore')}}</h1>
                </div>
                <ul class="categories-list grid grid-cols-3 py-4 gap-2">
                    <li>
                        <a href="{{route('category.business_posts.index', [__('page.category_names.video-animation')])}}" class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span class="px-4 text-center">{{__('page.category_names.Video & Animation')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.business_posts.index', [__('page.category_names.music-audio')])}}" class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-fuchsia-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                            <span class="text-center">{{__('page.category_names.Music & Audio')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.business_posts.index', [__('page.category_names.graphics-design')])}}" class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <span class="px-4 text-center">{{__('page.category_names.Graphics & Design')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.business_posts.index', [__('page.category_names.programming-tech')])}}" class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="px-10 text-center">{{__('page.category_names.Programming & Tech')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.business_posts.index',[__('page.category_names.lifestyle')])}}" class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span class="text-center">{{__('page.category_names.Lifestyle')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.business_posts.index',[__('page.category_names.data')])}}" class="flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                            <span class="text-center">{{__('page.category_names.Data')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
