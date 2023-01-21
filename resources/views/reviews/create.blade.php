@extends('app')
@section('title') {{ $meal->name }} @endsection
@section('content')
    <!-- show back button -->

    <section id="review">
        <div class="container-fluid py-8">
            <div class="mx-auto flex flex-wrap items-center">
                @if($meal->bildname)
                    <img alt="{{ $meal->name }}" class="lg:w-1/2 w-full object-cover object-center rounded-lg border border-base-200"
                        src="{{ asset('img/gerichte/'.$meal->bildname) }}"/>
                @else
                    <img alt="{{ $meal->name }}" class="lg:w-1/2 w-full object-cover object-center rounded-lg border border-base-200"
                         src="{{ asset('img/gerichte/00_image_missing.jpg') }}"/>
                @endif
                <div class="lg:w-1/2 w-full mt-6 lg:mt-0 lg:pl-10 lg:py-6 prose">
                    <!--<h2 class="text-sm title-font tracking-wider text-base-content/50">TODO: Kategorie anzeigen</h2>-->
                    <h1 class="mb-0">{{ $meal->name }}</h1>
                    <div class="mb-6">
                        @if ($meal->vegetarisch)
                            <span class="badge badge-success badge-outline">Vegetarisch</span>
                        @endif
                        @if ($meal->vegan)
                            <span class="badge badge-success badge-outline">Vegan</span>
                        @endif
                    </div>
                    <div class="flex mb-4 items-center">
                        <!--<div class="rating">
                            <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled>
                            <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled>
                            <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled checked>
                            <input type="radio" class="mask mask-star-2 bg-orange-300 cursor-default" disabled>
                        </div>-->
                        @if ($reviewCount == 1)
                            <span class="ml-0 text-sm text-gray-500">{{ $reviewCount }} Bewertung</span>
                        @else
                            <span class="ml-0 text-sm text-gray-500">{{ $reviewCount }} Bewertungen</span>
                        @endif
                    </div>
                    <p class="leading-relaxed">{{ $meal->beschreibung }}</p>
                    <div class="flex flex-wrap items-baseline justify-between mt-4">
                        <span class="title-font font-medium text-2xl text-base-content/90">{{ $meal->preis_intern }}€</span>
                        <span class="font-medium text-base-content/70 ml-4">({{ $meal->preis_extern }}€ für externe Gäste)</span>
                    </div>
                    <div class="flex mt-0 items-center">
                        <span class="text-xs">Erfasst am {{ $meal->erfasst_am }}</span>
                    </div>

                    @if(Auth::user())
                        <div tabindex="0" class="mt-16 collapse collapse-open border border-base-300 bg-base-100 rounded-box">
                            <!--<input type="checkbox" class="peer"/>-->
                            <div class="collapse-title text-xl font-medium">
                                Jetzt bewerten!
                            </div>
                            <div class="collapse-content">
                                <!-- Formular for rating -->
                                <form action="{{ route('review.store', $meal->id) }}" method="POST">
                                    @csrf
                                    <div class="form-control">
                                        <div class="flex justify-between items-center">
                                            <div class="rating rating-lg gap-2">
                                                <input type="radio" name="rating" class="hidden" value="-1" hidden disabled checked>
                                                <input type="radio" name="rating" class="mask mask-star-2 bg-orange-300" value="1">
                                                <input type="radio" name="rating" class="mask mask-star-2 bg-orange-300" value="2">
                                                <input type="radio" name="rating" class="mask mask-star-2 bg-orange-300" value="3">
                                                <input type="radio" name="rating" class="mask mask-star-2 bg-orange-300" value="4">
                                            </div>
                                            <!--<span class="ml-2">Gut</span>-->
                                        </div>
                                        @error('rating')
                                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-control mt-4">
                                        <label class="label" for="comment">
                                            <span class="label-text">Kommentar</span>
                                        </label>
                                        <textarea id="comment" class="textarea h-24 bg-base-200" name="comment" placeholder="Dein Kommentar&hellip; (255 Zeichen)"></textarea>
                                        @error('comment')
                                            <label class="label">
                                                <span class="text-red-500 text-xs italic label-text-alt">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </div>

                                    <div class="form-control mt-4">
                                        <button type="submit" class="btn btn-ghost gap-2">Bewerten
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('failed')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="mt-16">
                            Zum bewerten <a href="{{ route('login') }}" class="link">Anmelden</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
