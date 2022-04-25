@section('title',__('page.Create a New Post'))
@extends('layouts.app')
@section('content')
    <div class="flex flex-col bg-red-100 rounded-lg w-auto h-auto shadow-md m-6 overflow-hidden shadow-md sm:rounded-lg">
        <h1 class="flex w-full lg:flex items-center justify-center border-b border-gray-300 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate py-2">
            {{__('page.Create a New Post')}}</h1>
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data"
              class="lg:w-1/4 lg:mx-auto space-y-4 grid">
            @csrf
            <div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">{{__('page.Title')}}</label>
                    <div>
                        <input class="form-control w-full rounded" type="text" name="title" value="{{ old('title') }}"
                               placeholder="{{__('page.Title')}}" minlength="5" maxlength="100" required/>
                    </div>
                </div>

                <div>
                    <label class="w-20 text-right mr-8 font-bold">{{__('page.Content')}}</label>
                    <div class="control">
                        <textarea class="form-control block w-full px-3 py-1.5 text-base w-full rounded" name="content"
                                  placeholder="{{__('page.Content')}}"
                                  minlength="5" maxlength="2000" required rows="10">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div>
                    <label class="w-20 text-right mr-8 font-bold">{{__('page.Price')}}</label>
                    <div class="control">
                        <input class="form-control w-full rounded" name="price" placeholder="{{__('page.Price')}}" type="number">
                    </div>
                </div>

                <div>
                    <label class="w-20 text-right mr-8 font-bold">{{__('page.Category')}}</label>
                    <div class="control">
                        <div class="select bg-white">
                            <select
                                class="w-full block appearance-none bg-transparent bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                name="category" required>
                                @foreach($categories as $category)
                                    @if($category->parent_id != NULL)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="w-20 text-right mr-8 font-bold">{{__('page.Image')}}</label>
                    <div>
                        <input class="form-control" type="file" name="img" required/>
                    </div>
                </div>
                <div class="py-4 flex justify-center">
                    <button type="submit"
                            class="w-20 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                        {{__('page.buttons.Publish')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
