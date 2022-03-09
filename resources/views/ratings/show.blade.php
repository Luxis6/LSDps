Latest
<div>
    <span>
        <form class="form-inline my-2 my-lg-0" action="{{route('sort')}}" method="post">
            @csrf
            <select class="form-control mr-sm-2" name="sort" placeholder="Sort" aria-label="Sort" required>
                <option value="0" @if(!Session::get('sort') == "1") selected @endif>Sortbydate</option>
                <option value="1" @if(!Session::get('sort') == "0") selected @endif>Sortbyvote</option>
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
        </form>
    </span>
    <div class="courses-review-comments">
        <h3>{{count($ratings)}} votes</h3>
        @foreach($ratings as $rating)
            <div class="user-review">
                <img src="{{\App\User::find($rating->user)->photo}}" alt="image">
                <div class="review-rating">
                    <div class="review-stars">
                        @for($i = 0; $i < $rating->vote; $i++)
                            <i class='bx bxs-star'></i>
                        @endfor
                    </div>
                    <span class="d-inline-block">{{\App\User::find($rating->user)->name}}</span>
                </div>
                <span class="text-right">
                        @if($rating->user == Auth::id())
                        Title:{{$rating->vote}}
                        <a href="{{route('vote.remove', $rating->id)}}">Delete</a>
                    @endif
                    </span>
                @if($rating->comment != NULL && !empty($rating->comment))
                    <p class="text">{{$rating->comment}}</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
