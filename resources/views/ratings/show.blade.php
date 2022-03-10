Latest
<div>
    <span>
        <form class="form-inline my-2 my-lg-0" action="{{route('sort')}}" method="post">
            @csrf
            <select class="form-control mr-sm-2 w-1/5" name="sort" placeholder="Sort" aria-label="Sort" required>
                <option value="0" @if(!Session::get('sort') == "1") selected @endif>By date</option>
                <option value="1" @if(!Session::get('sort') == "0") selected @endif>By vote</option>
            </select>
            <button class="hover:text-green-500 my-2 my-sm-0" type="submit">Sort</button>
        </form>
    </span>
    <div class="courses-review-comments py-2">
        <h3>{{count($ratings)}} votes</h3>
        @foreach($ratings as $rating)
            <div class="bg-white border-t border-b border-gray-200">
               <!-- <img src="{{\App\Models\User::find($rating->user_id)->photo}}" alt="image">-->
                <div class="review-rating">
                    <div class="review-stars flex">
                        @for($i = 0; $i < $rating->vote; $i++)
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
                        @endfor
                        <span class="font-medium">{{\App\Models\User::find($rating->user_id)->name}}</span>
                    </div>
                </div>
                   @if($rating->comment != NULL && !empty($rating->comment))
                       <p class="text-gray-500 text-justify break-words">{{$rating->comment}}</p>
                   @endif
                <span class="text-right">
                        @if($rating->user_id == Auth::id())
                        <a class="hover:text-red-600" href="{{route('vote.remove', $rating->id)}}">Delete</a>
                    @endif
                    </span>

            </div>
        @endforeach
    </div>
</div>
