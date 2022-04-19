@section('title', 'Posts')
@extends('layouts.app')

@section('content')
    <div class="flex justify-center py-6">
        <h1 class="text-3xl leading-6 font-medium text-gray-900">{{$category->name}}</h1>
    </div>
    <div class="shorting">
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5">
            @if(Count($posts) > 0)
                @foreach($posts as $post)
                    <div class="border rounded-lg overflow-hidden shadow-lg">
                            <div class="">
                                <a href="{{ route('posts.show', [$post->slug]) }}" class="d-block" target="_blank"><img
                                        src="{{$post->img}}" alt="image"
                                        class="lg:h-72 md:h-48 w-full object-cover object-center"></a>
                                <div class="py-4">
                                    <div>
                                        <h3 class="flex justify-center"><a
                                                href="{{ route('posts.show', [$post->slug]) }}"
                                                class="py-2 text-md font-bold leading-7 text-gray-900 sm:text-xl sm:truncate"
                                                target="_blank">{{$post->title}}</a>
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
                                        <p class="break-words">
                                            @if(strlen($post->content) > 100)
                                                {{substr($post->content,0,100)}}...
                                            @else
                                                {{$post->content}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <h1 class="price text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate px-2">
                                            {{$post->price}} &euro;</h1>
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center col-span-4">
                <h2 class="font-medium text-xl">
                    No posts yet
                </h2>
                </div>
            @endif
        </div>
    </div>
    <div>

    </div>
@endsection
