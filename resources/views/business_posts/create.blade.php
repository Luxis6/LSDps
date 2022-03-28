@section('title','Create a new post')
@extends('layouts.app_business')
@section('content')
    <div class="flex flex-col bg-red-100 rounded-lg w-auto h-auto shadow-md m-6 overflow-hidden shadow-md sm:rounded-lg">
        <h1 class="flex w-full lg:flex items-center justify-center border-b border-gray-300 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Create a new post</h1>
        <form method="post" action="{{ route('business_posts.store') }}" enctype="multipart/form-data"
              class="lg:w-1/2 lg:mx-auto space-y-4 grid">
            @csrf
            <div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Title</label>
                    <div>
                        <input class="form-control w-full rounded" type="text" name="title"
                               class="input"
                               placeholder="Title" minlength="5" maxlength="100" required/>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Category</label>
                    <div class="control">
                        <div class="select bg-white">
                            <select
                                class="w-full block appearance-none bg-transparent bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                name="category" required>
                                @foreach($categories as $category)
                                    @if($category->parent_id == NULL)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Job Content</label>
                    <div class="control">
                        <textarea class="form-control block w-full px-3 py-1.5 text-base rounded" name="job_content"
                                  placeholder="Job Content"
                                  minlength="5" maxlength="2000" required rows="10"></textarea>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Job Requirements</label>
                    <div class="control">
                        <textarea class="form-control block w-full px-3 py-1.5 text-base w-full rounded" name="job_requirements"
                                  placeholder="Job Requirements"
                                  minlength="5" maxlength="2000" required rows="10"></textarea>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Job Offer</label>
                    <div class="control">
                        <textarea class="form-control block w-full px-3 py-1.5 text-base w-full rounded" name="job_offer"
                                  placeholder="Job Offer"
                                  minlength="5" maxlength="2000" required rows="10"></textarea>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Job Salary</label>
                        <input id="job_salary" class="form-control w-full rounded" type="text" name="job_salary"
                               placeholder="" minlength="5" maxlength="100" required/>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Job Type</label>
                    <div class="control">
                        <div class="select bg-white">
                            <select
                                class="w-full block appearance-none bg-transparent bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                name="job_type" required>
                                <option value="1">Internship</option>
                                <option value="2">Part-Time</option>
                                <option value="3">Full-Time</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">City</label>
                    <div>
                        <input class="form-control w-full rounded" type="text" name="city"
                               class="input"
                               placeholder="City" minlength="5" maxlength="100" required/>
                    </div>
                </div>
                <div>
                    <label class="w-20 text-right mr-8 font-bold">Business Link</label>
                    <div>
                        <input class="form-control w-full rounded" type="text" name="business_link"
                               class="input"
                               placeholder="Business Link" minlength="5" maxlength="500" required/>
                    </div>
                </div>
                <div class="py-4 flex justify-center">
                    <button type="submit"
                            class="w-20 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                        Publish
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

