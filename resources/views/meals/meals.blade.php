@extends('app')
@section('title') Gerichte @endsection
@section('content')
    <!-- Food -->
    <section id="food" class="py-8">
        <div class="container-fluid">
            <div class="prose max-w-none w-full mb-8">
                <h1 class="text-left md:text-center">Köstlichkeiten</h1>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 auto-cols-auto auto-rows-auto gap-10 grid-flow-row mb-8">
                @foreach($meals as $meal)
                    @php
                        $limitCount++;
                    @endphp
                    @include('meals.meal_element')
                    @if($limitCount >= $limit)
                        @break
                    @endif
                @endforeach
                @if($limitCount == 0)
                    <div class="col-span-1 lg:col-span-2 xl:col-span-3">
                        <div class="prose max-w-none w-full">
                            <p class="text-center">Leider wurden keine passenden Gerichte gefunden.</p>
                        </div>
                    </div>
                @endif
            </div>
            <div>
                @foreach($allAllergens as $allergen)
                    <span class="inline-block bg-base-200 rounded-full px-3 py-1 text-sm font-semibold text-base-content mr-2 mb-2">
                        {{ $allergen->code }} {{ $allergen->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

@endsection
