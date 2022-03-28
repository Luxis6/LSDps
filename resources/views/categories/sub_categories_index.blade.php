@extends('layouts.app')
@section('title', $main_category->name)
@section('content')
    <div class="flex flex-col items-center">
        <div class="py-6">
            <h3 class="text-3xl leading-6 font-medium text-gray-900">{{$main_category->name}}</h3>
        </div>
        @foreach($categories as $category)
        <a href="{{route('category.posts.index', [$main_category->slug,$category->slug])}}" class="hover:border-b hover:text-red-600 py-2"> {{$category->name}}</a>
        @endforeach
    </div>
@endsection
