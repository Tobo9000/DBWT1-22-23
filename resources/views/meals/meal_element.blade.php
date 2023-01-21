<a href="{{ route('review.create', ['id' => $meal->id]) }}">
    <div class="card w-full max-w-96 bg-base-200 box shadow-lg hover:shadow-xl transition-shadow tilt-parallax" data-tilt data-tilt-glare data-tilt-max-glare="0.1">
        <figure>
            @if($meal->bildname)
                <img src="{{ asset('img/gerichte/'.$meal->bildname) }}" class="h-48 w-96 object-cover object-center" alt="Gericht"/>
            @else
                <img src="{{ asset('img/gerichte/00_image_missing.jpg') }}" class="h-48 w-96 object-cover object-center" alt="Gericht"/>
            @endif
        </figure>
        <div class="card-body tilt-parallax-inner">
            <h2 class="card-title">
                {{ $meal->name  }}
            </h2>
            <div class="mb-2">
                <p>{{ $meal->beschreibung }}</p>
                <p>
                    <span class="mr-4">Intern: <span class="font-bold">{{ $meal->preis_intern  }}€</span></span>
                    <span class="mr-4">Extern: <span class="font-bold">{{ $meal->preis_extern  }}€</span></span>
                </p>
            </div>
            <div class="card-actions justify-end">
                @if(!empty($allergenCodes[$meal->id]))
                    @foreach($allergenCodes[$meal->id] as $code)
                        <div class="badge badge-outline">{{ $code->code }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</a>

