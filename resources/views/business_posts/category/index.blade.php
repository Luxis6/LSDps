@section('title', __('page.Business Posts'))
@extends('layouts.app_business')

@section('content')
    <div class="flex justify-center py-6">
        <h1 class="text-3xl leading-6 font-medium text-gray-900">{{$category->name}}</h1>
    </div>
    <div class="shorting">
        <div
            class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-5 auto-cols-min ">
            @if(Count($business_posts) > 0)
                @foreach($business_posts as $business_post)
                    <div class="border rounded-lg overflow-hidden shadow-lg">
                        <div class="py-4">
                            <div>
                                <h3 class="flex justify-center"><a
                                        href="{{ route('business_posts.show', [$business_post->slug]) }}"
                                        class="py-2 text-md font-bold leading-7 text-gray-900 sm:text-xl break-words" target="_blank">{{$business_post->title}}</a>
                                </h3>
                            </div>
                            <div class="px-2">
                                <h3 class="flex justify-center">
                                    {{App\Models\User::find($business_post->user_id)->name}}
                                </h3>
                            </div>
                            <div class="px-2">
                                <h3 class="flex justify-center">
                                    {{$business_post->city}}
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
                            <div class="px-2">
                                <h3 class="flex justify-end font-bold">
                                    {{$business_post->job_salary}}
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2 class="font-bold text-xl">{{__('page.No posts yet')}}</h2>
            @endif
        </div>
    </div>
@endsection
