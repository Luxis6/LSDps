@section('title',$post->title)
@extends('layouts.app')
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
                                                       value=""
                                                       placeholder="Title" minlength="5" maxlength="100" required/>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Content</label>
                                            <div class="control">
                                            <textarea
                                                class="form-control block w-full px-3 py-1.5 text-base w-full rounded"
                                                name="content"
                                                placeholder="Content"
                                                minlength="5" maxlength="2000" required
                                                rows="10">{{ old('content') }}</textarea>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Price</label>
                                            <div class="control">
                                                <input class="form-control w-full rounded" name="price"
                                                       placeholder="price" type="number">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="w-20 text-right mr-8 font-bold">Category</label>
                                            <div class="control">
                                                <div class="select">
                                                    <select
                                                        class="w-full block appearance-none bg-transparent bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                        name="category" required>
                                                        @foreach($categories as $category)
                                                            @if($category->parent_id != NULL)
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
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
                        <h1 class="py-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">{{$post->title}}</h1>
                        <h2 class="text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate">{{\App\Models\User::find($post->user_id)->name}}</h2>
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
                        <span>{{\App\Models\Category::find($post->category)->name}}</span>
                    </div>
                    <div class="col-lg-4">
                        <div class="courses-price">
                            <div class="flex">
                                @if(App\Models\Rating::where('post_id', $post->id)->exists())
                                    <div class="flex">
                                        <h1 class="px-1">{{\App\Http\Helpers::getRating($post->id)}}</h1>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-yellow-300 fill-current"
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
                                    <span class="px-2">({{App\Models\Rating::where('post_id', $post->id)->count()}} reviews)</span>

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="py-2 lg:flex lg:justify-center">
                        <img class="pinterest-img w-auto lg:w-3/5" style="max-width: 100%" src="{{$post->img}}" alt="image">
                    </div>
                    <div class="share-btn-container flex flex-row lg:justify-center">
                        <a href="#" class="facebook-btn px-1" style="font-size: 26px" target="_blank">
                            <i class="fab fa-facebook" style="color: #1877f2"></i>
                        </a>

                        <a href="#" class="twitter-btn px-1" style="font-size: 26px" target="_blank">
                            <i class="fab fa-twitter" style="color: #1da1f2"></i>
                        </a>

                        <a href="#" class="pinterest-btn px-1" style="font-size: 26px" target="_blank">
                            <i class="fab fa-pinterest" style="color: #e60023"></i>
                        </a>

                        <a href="#" class="linkedin-btn px-1" style="font-size: 26px" target="_blank">
                            <i class="fab fa-linkedin" style="color: #0077b5"></i>
                        </a>

                        <a href="#" class="whatsapp-btn px-1" style="font-size: 26px" target="_blank">
                            <i class="fab fa-whatsapp" style="color: #25d366"></i>
                        </a>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">About</h1>
                        <div class="">
                            <p class="text-sm leading-7 text-gray-900 text-justify break-words break-all">{{$post->content}}</p>
                        </div>
                    </div>
                </div>
                <div class="px-10">
                    <div class="row">
                        <div class="col-md-6">
                            @if(Auth::user()->type > 0)
                                @if(!\App\Http\Services\RatingsService::voted(Auth::id(), $post->id))
                                    <form method="post" action="{{route('vote', $post->id)}}"
                                          class="flex flex-col lg:w-1/2 w-auto">
                                        @csrf
                                        <select name="vote" class="form-control px-2" required>
                                            <option selected disabled value="">Choose vote</option>
                                            <?php
                                            for ($i = 1; $i <= 5; $i++)
                                                if($i == 1) {
                                                        echo '<option value="' . $i . '">' . $i . ' ' . 'star' . '</option>';
                                                }
                                                else{
                                                    echo '<option value="' . $i . '">' . $i . ' ' . 'stars' . '</option>';
                                                }
                                            ?>
                                        </select>
                                        <!--<div id="rateYo" class="py-2"></div>
                                        <input type="hidden" id="vote" name="vote" required>-->
                                        <textarea type="text" name="comment" class="form-control"
                                                  placeholder="Your comment"
                                                  oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                                        <div class="flex justify-center py-4">
                                            <input type="submit"
                                                   class="form-control flex justify-center lg:w-1/3 w-1/2 block rounded bg-transparent bg-yellow-300 hover:bg-yellow-500 py-2 font-bold shadow"
                                                   value="Vote"/>
                                        </div>

                                    </form>
                                @endif
                            @endif
                        </div>
                        {{ App::make('App\Http\Controllers\RatingController')->show(['post_id' => $post->id]) }}
                    </div>
                </div>
            </div>
            <aside class="bg-white w-2/5 max-h-40 m-4 sticky shadow" style="position: sticky; top: 2rem">
                <div class="flex justify-center border-b border-gray-300 bg-gray-100">
                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Order</h1>
                </div>
                <div class="flex lg:flex-row md:flex-row  items-center justify-center border-b border-gray-300">
                    <h2 class="text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate">Price:</h2>
                    <h2 class="price text-sm font-bold leading-7 text-gray-900 sm:text-md sm:truncate px-2">
                        {{$post->price}} &euro;</h2>
                </div>
                <div class="py-10 bg-gray-100 flex justify-center">
                    @if(Auth::user()->type > 0)
                        @if($post->user_id != Auth::id())
                            <a href="{{route('order', $post->slug)}}"
                               class="flex justify-center w-2/3 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                                Continue
                            </a>

                        @else
                            <button type="button"
                                    class="openModal flex justify-center w-2/3 block rounded bg-transparent bg-blue-300 hover:bg-blue-500 py-2 font-bold shadow"
                                    data-target="#PostModal" data-id="{{ $post->id }}" data-slug="{{$post->slug}}"
                                    data-title="{{ $post->title }}" data-content="{{ $post->content }}"
                                    data-price="{{ $post->price }}" data-category="{{ $post->category }}">
                                Edit
                            </button>
                        @endif
                    @else
                        <button
                            class="btn_continue flex justify-center w-2/3 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                            Continue
                        </button>
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
    <script>
        const facebookBtn = document.querySelector(".facebook-btn");
        const twitterBtn = document.querySelector(".twitter-btn");
        const pinterestBtn = document.querySelector(".pinterest-btn");
        const linkedinBtn = document.querySelector(".linkedin-btn");
        const whatsappBtn = document.querySelector(".whatsapp-btn");

        function init() {
            const pinterestImg = document.querySelector(".pinterest-img");
            let postUrl = encodeURI(document.location.href);
            let postTitle = encodeURI("Hi everyone, please check this out: ");
            let postImg = encodeURI(pinterestImg.src);

            facebookBtn.setAttribute(
                "href",
                `https://www.facebook.com/sharer.php?u=${postUrl}`
            );

            twitterBtn.setAttribute(
                "href",
                `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
            );

            pinterestBtn.setAttribute(
                "href",
                `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
            );

            linkedinBtn.setAttribute(
                "href",
                `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
            );

            whatsappBtn.setAttribute(
                "href",
                `https://wa.me/?text=${postTitle} ${postUrl}`
            );
        }

        init();
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.openModal').on('click', function (e) {
                var slug = $(this).data('slug');
                var title = $(this).data('title');
                var content = $(this).data('content');
                var price = $(this).data('price');
                var category = $(this).data('category');
                var url = "{{ url('posts/update') }}/" + slug;
                $('#PostModal form').attr('action', url);
                $('#PostModal form input[name="title"]').val(title);
                $('#PostModal form textarea[name="content"]').val(content);
                $('#PostModal form input[name="price"]').val(price);
                $('#PostModal form select option[name="category"]').val(category);
                $('#PostModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function (e) {
                $('#PostModal').addClass('invisible');
            });
        });
    </script>
    <script>
        $('.btn_continue').on('click', function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "You aren't verified yet!",
                showCloseButton: true

            })
        })
    </script>
    <script>
        $(function () {
            $("#rateYo").rateYo({
                fullStar: true,
                starSvg : "<svg xmlns='http://www.w3.org/2000/svg' class='w-8 h-8 hover:fill-current text-yellow-300 hover:text-yellow-400' fill='none' viewBox='0 0 24 24' stroke='currentColor' >  <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'/> </svg>",
                ratedFill: "#fde047",
                normalFill: "#ffffff",
                onSet: function (vote, rateYoInstance) {

                    $("#vote").val(vote);
                }
            });
        });
    </script>
@endsection
