<div>
    <span>
        <form class="form-inline my-2 my-lg-0 flex lg:flex-row md:flex-row flex-col" action="{{route('sort')}}" method="post">
            @csrf
            <select class="form-control mr-sm-2 lg:w-1/5 w-auto" name="sort" aria-label="{{__('page.Sort')}}" required>
                <option value="0" @if(!Session::get('sort') == "1") selected @endif>{{__('page.Most votes')}}</option>
                <option value="1" @if(!Session::get('sort') == "0") selected @endif>{{__('page.Most recent')}}</option>
            </select>
            <div class="px-2 lg:py-0 py-2 flex justify-center">
            <button class="flex justify-center block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 px-2 font-bold shadow" type="submit">Sort</button>
            </div>
        </form>
    </span>
    <h3 class="font-medium text-lg">{{__('page.Votes')}}</h3>
    <div class="courses-review-comments py-2">
        <h3>{{count($ratings)}} {{__('page.votes')}}</h3>
        @foreach($ratings as $rating)
            <div class="bg-white border-t border-b border-gray-200">
               <!-- <img src="{{\App\Models\User::find($rating->user_id)->photo}}" alt="image">-->
                <div class="review-rating">
                    <div class="review-stars flex">
                        @for($i = 0; $i < $rating->vote; $i++)
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
                        @endfor
                        <span class="font-medium">{{\App\Models\User::find($rating->user_id)->name}}</span>
                    </div>
                    <i class="text-sm">{{\Carbon\Carbon::parse($rating->created_at)->diffForHumans()}}</i>
                </div>
                   @if($rating->comment != NULL && !empty($rating->comment))
                       <p class="text-gray-500 text-justify break-words">{{$rating->comment}}</p>
                   @endif
                <span class="text-right">
                        @if($rating->user_id == Auth::id())
                        <a class="hover:text-red-600" href="{{route('vote.remove', $rating->id)}}">{{__('page.buttons.Delete')}}</a>
                    @endif
                    </span>

            </div>
        @endforeach
    </div>
</div>
