@extends('app')
@section('title', 'Impressum')
@section('content')
    <section id="imprint">
        <div class="container-fluid py-8">
            <div class="flex flex-wrap justify-center items-center md:gap-8 lg:gap-16">
                <div class="sm:w-1/2 prose">
                    <h1>Impressum</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
                <div>
                    <img src="{{ asset('img/about.svg') }}" class="w-full sm:h-64" alt="Impressum">
                </div>
            </div>
        </div>
    </section>
@endsection
