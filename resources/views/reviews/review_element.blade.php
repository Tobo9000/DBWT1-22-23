<div class="card w-full max-w-96 box shadow-lg hover:shadow-xl transition-shadow bg-base-200 {{ $review->hervorgehoben ? 'border-l-4 border-primary/50' : '' }}">
    <div class="px-8 pt-8 flex gap-4 items-center">
        <div class="avatar">
            <div class="w-16 rounded">
                @if($review->meal->bildname)
                    <img src="{{ asset('img/gerichte/'.$review->meal->bildname) }}" class="h-48 w-96 object-cover object-center" alt="Gericht"/>
                @else
                    <img src="{{ asset('img/gerichte/00_image_missing.jpg') }}" class="h-48 w-96 object-cover object-center" alt="Gericht"/>
                @endif
            </div>
        </div>
        <div>
            <h2>{{ $review->meal->name }}</h2>
        </div>
    </div>
    <div class="card-body justify-between pt-4 pb-8">
        <div class="flex gap-4 items-center flex-wrap">
            <h2 class="card-title">
                {{ $review->benutzer->name  }}
            </h2>
            <div class="rating rating-sm gap-2">
                <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled value="1" @checked($review->level == 1)>
                <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled value="2" @checked($review->level == 2)>
                <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled value="3" @checked($review->level == 3)>
                <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled value="4" @checked($review->level == 4)>
            </div>
        </div>
        <div>
            <p>{{ $review->bemerkung }}</p>
        </div>
        <div class="card-actions justify-end">
            @if(Auth::user() && Auth::user()->admin)
                <form action="{{ route('review.update', $review->id) }}" method="POST">
                    @csrf
                    @if($review->hervorgehoben)
                        <button type="submit" class="btn btn-xs btn-info">Hervorgehoben</button>
                    @else
                        <button type="submit" class="btn btn-outline btn-xs btn-info">Hervorheben</button>
                    @endif
                </form>
            @endif
            @if(Auth::user() && $review->benutzer->id == Auth::user()->id)
                <form action="{{ route('review.destroy', ['id' => $review->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline btn-xs btn-error">Löschen</button>
                </form>
            @endif
        </div>
    </div>
</div>
