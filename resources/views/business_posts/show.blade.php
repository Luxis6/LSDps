@section('title',$business_post->title)
@extends('layouts.app_business')
@section('content')
    <div class="container">
        <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog"
             aria-modal="true" id="PostModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-3/5">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h1 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Edit post
                                </h1>
                                <div class="mt-2">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PATCH')
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
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Job Content</label>
                                            <div class="control">
                                                <textarea
                                                    class="form-control block w-full px-3 py-1.5 text-base rounded"
                                                    name="job_content"
                                                    placeholder="Job Content"
                                                    minlength="5" maxlength="2000" required rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Job Requirements</label>
                                            <div class="control">
                                                 <textarea
                                                     class="form-control block w-full px-3 py-1.5 text-base w-full rounded"
                                                     name="job_requirements"
                                                     placeholder="Job Requirements"
                                                     minlength="5" maxlength="2000" required rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Job Offer</label>
                                            <div class="control">
                                                <textarea
                                                    class="form-control block w-full px-3 py-1.5 text-base w-full rounded"
                                                    name="job_offer"
                                                    placeholder="Job Offer"
                                                    minlength="5" maxlength="2000" required rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Job Salary</label>
                                            <div class="control">
                                                <div>
                                                    <input class="form-control w-full rounded" type="text"
                                                           name="job_salary"
                                                           class="input"
                                                           placeholder="Salary" minlength="5" maxlength="100" required/>
                                                </div>
                                            </div>
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
                                                <input class="form-control w-full rounded" type="text"
                                                       name="business_link"
                                                       class="input"
                                                       placeholder="Business Link" minlength="5" maxlength="500"
                                                       required/>
                                            </div>
                                        </div>
                                        <div class="bg-white px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Update
                                            </button>
                                            <button type="button"
                                                    class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-100 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Close
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col-2">
            <div class="lg:w-4/5 w-3/5">
                <div class="md:w-full mx-auto space-y-4 grid px-10 py-2">
                    <div>
                        <h1 class="py-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">{{$business_post->title}}</h1>
                    </div>
                    <div class="flex">
                        <h2 class="text-sm font-medium leading-7 text-gray-900 sm:text-md sm:truncate">{{$business_post->city}}</h2>
                        <h2 class="px-1 text-sm font-bold leading-7 text-gray-600 sm:text-md sm:truncate">-
                            "{{\App\Models\User::find($business_post->user_id)->name}}"</h2>
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
                        <span>{{\App\Models\Category::find($business_post->category)->name}}</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate py-1">Type</h1>
                        @if($business_post->job_type == 1)
                            <h2>Internship</h2>
                        @elseif($business_post->job_type == 2)
                            <h2>Part-Time</h2>
                        @elseif($business_post->job_type == 3)
                            <h2>Full-Time</h2>
                        @endif
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">About</h1>
                        <div class="">
                            <p class="text-sm leading-7 text-gray-900 text-justify break-words break-all"
                               style="white-space: pre-wrap">{{$business_post->job_content}}</p>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">Requirements</h1>
                        <div class="">
                            <p class="text-sm leading-7 text-gray-900 text-justify break-words break-all"
                               style="white-space: pre-wrap">{{$business_post->job_requirements}}</p>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">We offer</h1>
                        <div class="">
                            <p class="text-sm leading-7 text-gray-900 text-justify break-words break-all"
                               style="white-space: pre-wrap">{{$business_post->job_offer}}</p>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">Salary</h1>
                        <div class="">
                            <p class="text-sm leading-7 text-gray-900 text-justify break-words break-all"
                               style="white-space: pre-wrap">{{$business_post->job_salary}}</p>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">Read more about
                            us</h1>
                        <div class="">
                            <a href="{{$business_post->business_link}}"
                               class="text-sm leading-7 text-gray-900 hover:text-red-600 hover:underline text-justify"
                               target="_blank">{{$business_post->business_link}}</a>
                        </div>
                    </div>
                    @if($business_post->user_id != Auth::id())
                        <div>
                            <a href="{{route('application',$business_post->slug)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                Apply Now
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            @if(Auth::user()->type > 0)
                @if($business_post->user_id == Auth::id())
                    <aside class="bg-white w-2/5 max-h-40 m-4 sticky shadow" style="position: sticky; top: 2rem">
                        <div class="flex justify-center border-b border-gray-300 bg-gray-100">
                            <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Edit
                                Post</h1>
                        </div>
                        <div class="py-10 bg-gray-100 flex justify-center">
                            <button type="button"
                                    class="openModal flex justify-center w-2/3 block rounded bg-transparent bg-blue-300 hover:bg-blue-500 py-2 font-bold shadow"
                                    data-target="#PostModal" data-id="{{ $business_post->id }}"
                                    data-slug="{{$business_post->slug}}"
                                    data-title="{{ $business_post->title }}"
                                    data-category="{{ $business_post->category }}"
                                    data-job_content="{{ $business_post->job_content }}"
                                    data-job_requirements="{{ $business_post->job_requirements }}"
                                    data-job_offer="{{ $business_post->job_offer }}"
                                    data-job_salary="{{ $business_post->job_salary }}"
                                    data-city="{{ $business_post->city }}"
                                    data-business_link="{{ $business_post->business_link }}">
                                Edit
                            </button>
                        </div>
                    </aside>
                @endif
            @endif
        </div>
    </div>
    <!--
        <!—- ShareThis BEGIN -—>
        <script async
                src="https://platform-api.sharethis.com/js/sharethis.js#property=5eac0d0e3c3da40012262fdb&product=sticky-share-buttons"></script>
        <!—- ShareThis END -—>
        -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.openModal').on('click', function (e) {
                var slug = $(this).data('slug');
                var title = $(this).data('title');
                var category = $(this).data('category');
                var job_content = $(this).data('job_content');
                var job_requirements = $(this).data('job_requirements');
                var job_offer = $(this).data('job_offer');
                var job_salary = $(this).data('job_salary');
                var job_type = $(this).data('job_type');
                var city = $(this).data('city');
                var business_link = $(this).data('business_link');

                var url = "{{ url('business_posts/update') }}/" + slug;
                $('#PostModal form').attr('action', url);
                $('#PostModal form input[name="title"]').val(title);
                $('#PostModal form select option[name="category"]').val(category);
                $('#PostModal form textarea[name="job_content"]').val(job_content);
                $('#PostModal form textarea[name="job_requirements"]').val(job_requirements);
                $('#PostModal form textarea[name="job_offer"]').val(job_offer);
                $('#PostModal form input[name="job_salary"]').val(job_salary);
                $('#PostModal form select option[name="job_type"]').val(job_type);
                $('#PostModal form input[name="city"]').val(city);
                $('#PostModal form input[name="business_link"]').val(business_link);
                $('#PostModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function (e) {
                $('#PostModal').addClass('invisible');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.openApplicationModal').on('click', function (e) {
                $('#ApplicationModal').removeClass('invisible');
            });
            $('.closeApplicationModal').on('click', function (e) {
                $('#ApplicationModal').addClass('invisible');
            });
        });
    </script>
@endsection
