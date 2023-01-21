@extends('app')
@section('title') E-Mensa @endsection
@section('content')
    <!-- Hero -->
    <section id="hero" class="lg:py-8">
        <div class="hero lg:container-fluid lg:rounded-box" style="background-image: url('{{ asset('img/hero-food.jpg') }}')">
            <div class="hero-overlay bg-opacity-60 lg:rounded-box"></div>
            <div class="max-w-md py-32">
                <h1 class="mb-5 text-5xl font-bold text-white">Ihre E-Mensa&hellip;</h1>
                <p class="mb-5 text-white">versorgt Sie ab sofort mit Infos rund um unsere großartigen Mahlzeiten. </p>
                <!-- TODO: add route -->
                <a href="{{ route('meals') }}">
                    <button class="btn gap-2 btn-primary">
                        Unsere Speisen
                        <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </section>

    <!-- Announcements -->
    <section id="announcements">
        <div class="container-fluid py-8">
            <div class="flex flex-wrap justify-center items-center md:gap-8 lg:gap-16">
                <div class="sm:w-1/2 prose">
                    <h1>Essen</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
                <div>
                    <img src="{{ asset('img/cooking.svg') }}" class="w-full sm:h-64" alt="Lorem ipsum">
                </div>
            </div>
        </div>
        <div class="container-fluid py-8">
            <div class="flex flex-wrap-reverse justify-center items-center md:gap-8 lg:gap-16">
                <div>
                    <img src="{{ asset('img/discussing.svg') }}" class="w-full sm:h-64" alt="Lorem ipsum">
                </div>
                <div class="sm:w-1/2 prose">
                    <h1>Treffen</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid py-8">
            <div class="flex flex-wrap justify-center items-center md:gap-8 lg:gap-16">
                <div class="sm:w-1/2 prose">
                    <h1>Pause machen</h1>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
                <div>
                    <img src="{{ asset('img/coffee.svg') }}" class="w-full sm:h-64" alt="Lorem ipsum">
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews -->
    @if ($highlightedReviews)
        <section id="reviews" class="py-12">
            <div class="container-fluid">
                <div class="prose max-w-none w-full mb-12">
                    <h1 class="text-left md:text-center">
                        Das sagen unsere Besucher
                    </h1>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 auto-cols-auto auto-rows-auto gap-10 grid-flow-row mb-8">
                    @foreach($highlightedReviews as $review)
                        @include('reviews.review_element')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Stats / Numbers -->
    <!-- TODO: adjust to laravel -->
    <section class="py-12" id="numbers">
        <div class="container-fluid">
            <div class="prose max-w-none w-full mb-12">
                <h1 class="text-left md:text-center">E-Mensa in Zahlen</h1>
            </div>
            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-figure text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-width="2" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <div class="stat-title">Seitenbesucher</div>
                    <div class="stat-value text-warning">123<!--php echo $visitsAmount --></div>
                    <div class="stat-desc">es werden immer mehr!</div>
                </div>
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-width="2" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                    </div>
                    <div class="stat-title">Speisen</div>
                    <div class="stat-value text-primary">21<!--php echo $mealsAmount --></div>
                    <div class="stat-desc">größte Auswahl in der Region!</div>
                </div>
                <div class="stat">
                    <div class="stat-figure text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-width="2" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <div class="stat-title">Newsletteranmeldungen</div>
                    <div class="stat-value text-accent">42<!--php echo $newsletterAmount --></div>
                    <div class="stat-desc">stets informiert!</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Important -->
    <section class="py-8" id="important">
        <div class="container-fluid">
            <div class="prose max-w-none w-full mb-8">
                <h2 class="text-left md:text-center">Das ist uns wichtig</h2>
            </div>
            <div class="">
                <ul class="steps steps-vertical">
                    <li class="step step-primary">Beste frische saisonale Zutaten</li>
                    <li class="step ">Ausgewogene abwechslungsreiche Gerichte</li>
                    <li class="step step-secondary">Sauberkeit</li>
                </ul>
            </div>

        </div>
    </section>

    <section class="py-8">
        <div class="container-fluid">
            <div class="prose max-w-none w-full mb-8">
                <h2 class="text-left md:text-center">Wir freuen uns auf Ihren Besuch!</h2>
            </div>
        </div>
    </section>
@endsection
