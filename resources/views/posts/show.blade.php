@section('title',$post->title)
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex flex-col-2">
            <div class="w-4/5">
                <div class="md:w-full mx-auto space-y-4 grid px-10 py-2">
                    <div>
                        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">{{$post->title}}</h1>
                        <h3 class="text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate">{{\App\Models\User::find($post->user_id)->name}}</h3>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                        </svg>
                        <span>Category</span>
                    </div>
                    <a>{{\App\Models\Category::find($post->category)->name}}</a>
                    <div class="col-lg-4">
                        <div class="courses-price">
                            <div class="courses-review">
                                @if(App\Models\Rating::where('post_id', $post->id)->exists())
                                    <div class="review-stars">
                                        @for($i = 0; $i < (int)\App\Http\Helpers::getRating($post->id); $i++)
                                            <i class='bx bxs-star'></i>
                                        @endfor
                                        @if ((int)\App\Http\Helpers::getRating($post->id) < \App\Http\Helpers::getRating($post->id))
                                            <i class='bx bxs-star-half'></i>
                                        @endif
                                    </div>
                                    <span class="reviews-total d-inline-block">({{App\Models\Rating::where('post_id', $post->id)->count()}} reviews)</span>

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <img class="w-1/2" src="{{$post->img}}" alt="image">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">About</h1>
                        <div>
                            <p class="text-sm leading-7 text-gray-900 text-left w-1/2">{{$post->content}}</p>
                        </div>
                    </div>
                </div>
                <div class="px-10">
                    <div class="row">
                        <div class="col-md-6">
                            @if(!\App\Http\Services\RatingsService::voted(Auth::id(), $post->id))
                                <form method="post" action="{{route('vote', $post->id)}}" class="flex flex-col w-1/2">
                                    @csrf
                                    <select name="vote" class="form-control" required>
                                        <option selected disabled>Choose vote</option>
                                        <?php
                                        for ($i = 1; $i <= 5; $i++)
                                            echo '<option value="' . $i . '">' . $i . ' ' . 'votes' . '</option>';
                                        ?>
                                    </select>
                                    <input type="text" name="comment" class="form-control"
                                           placeholder="Your comment"/>
                                    <input type="submit" class="form-control btn btn-primary" value="Vote"/>
                                </form>
                            @endif
                        </div>
                        {{ App::make('App\Http\Controllers\RatingController')->show(['post_id' => $post->id]) }}
                    </div>
                </div>
            </div>
            <aside class="bg-white w-2/5 max-h-40 m-4 sticky w-10 shadow" style="position: sticky; top: 2rem">
                <div class="flex justify-center border-b border-gray-300 bg-gray-100">
                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Order</h1>
                </div>
                <div class="flex justify-center border-b border-gray-300">
                    <h1 class="text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate">Price</h1>
                    <h1 class="price text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate px-2">
                        {{$post->price}} &euro;</h1>
                </div>
                <div class="py-10 bg-gray-100 flex justify-center">
                    @if($post->user_id != Auth::id())
                        <a href="{{route('order', $post->slug)}}" class="flex justify-center w-2/3 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                            Continue
                        </a>

                    @else
                        <a href="{{route('posts.edit', $post->slug)}}" class="flex justify-center w-2/3 block rounded bg-transparent bg-blue-300 hover:bg-blue-500 py-2 font-bold shadow">
                            Edit
                        </a>

                    @endif
                </div>
            </aside>
        </div>
    </div>
    <!--
    <!—- ShareThis BEGIN -—>
    <script async
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5eac0d0e3c3da40012262fdb&product=sticky-share-buttons"></script>
    <!—- ShareThis END -—>
    -->
@endsection
