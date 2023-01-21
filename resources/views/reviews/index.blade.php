@extends('app')
@section('title') Bewertungen @endsection
@section('content')
    <!-- Reviews -->
    <section id="reviews" class="py-8">
        <div class="container-fluid">
            <div class="prose max-w-none w-full mb-8">
                <h1 class="text-left md:text-center">
                    @if(Request::get('user'))
                        {{ \App\Models\Benutzer::find(Request::get('user'))->name }}'s Bewertungen
                    @else
                        Bewertungen
                    @endif
                </h1>
            </div>
            @if(!Request::get('user'))
                <form action="{{ route('reviews') }}" method="get">
                    <!--@csrf-->
                    <div class="w-full gap-4 flex flex-wrap mb-8 rounded-xl border border-base-300 p-4 bg-primary/10 justify-between items-center">
                        <div>
                            <input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Suche nach Gericht&hellip;" class="input input-bordered w-full input-sm max-w-xs">
                        </div>
                        <div>
                            <select name="sort" id="sort" class="select select-sm select-bordered w-full max-w-xs" onchange="this.form.submit()">
                                <option value="date" @selected(Request::get('sort') == 'date')>Erstelldatum</option>
                                <option value="highest" @selected(Request::get('sort') == 'highest')>Höchste</option>
                                <option value="lowest" @selected(Request::get('sort') == 'lowest')>Niedrigste</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" hidden name="user" value="{{ Request::get('user') }}" />
                    <input type="submit" hidden />
                </form>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 auto-cols-auto auto-rows-auto gap-10 grid-flow-row mb-8">
                @if($reviews->count() == 0)
                    <div class="col-span-1 lg:col-span-2 xl:col-span-3">
                        <div class="prose max-w-none w-full">
                            <p class="text-center">Leider wurden keine passenden Bewertungen gefunden.</p>
                        </div>
                    </div>
                @else
                    @foreach($reviews as $review)
                        @include('reviews.review_element')
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
