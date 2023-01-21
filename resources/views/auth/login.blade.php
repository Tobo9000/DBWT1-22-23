@extends('app')
@section('title') Anmelden @endsection
@section('content')
    <!-- Login form -->
    <section id="signin">

        <div class="container-fluid py-8">

            <!--<a class="btn btn-ghost normal-case text-xl" href="">E-Mensa</a>-->
            <div class="card lg:w-6/12 md:w-8/12 sm:w-10/12 w-full m-auto shadow-xl bg-base-100 backdrop-filter backdrop-blur-lg bg-opacity-80">
                <!--<figure><img src="https://placeimg.com/400/400/arch" alt="Login"/></figure>-->
                <div class="card-body">
                    <div class="prose text-center mt-2">
                        <h1>Anmelden</h1>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-control w-full my-5">
                            <label for="email" class="label">
                                <span class="label-text">Ihre E-Mail-Adresse</span>
                            </label>
                            <label class="input-group">
                                <input type="email" class="input input-bordered input-primary @error('email') input-error @enderror w-full input-sm lg:input-md"
                                       id="email" name="email"
                                       aria-describedby="emailHelp" placeholder=""
                                       value="{{ old('email') }}" autocomplete="email" autofocus/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                            </label>
                            @error('email')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="form-control w-full">
                            <label for="password" class="label">
                                <span class="label-text">Ihr Passwort</span>
                            </label>
                            <label class="input-group">
                                <input type="password" class="input input-bordered input-primary @error('password') input-error @enderror w-full input-sm lg:input-md"
                                       id="password" name="password" placeholder=""
                                       autocomplete="current-password"/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                    </svg>
                                </span>
                            </label>

                            <label class="label">
                                <span class="label-text-alt text-error">
                                    @error('password'){{ $message }}@enderror
                                </span>

                                @if (Route::has('password.request'))
                                    <a href="./notyetimplemented" class="link link-hover">
                                        <span class="label-text-alt">Passwort vergessen?</span>
                                    </a>
                                @endif
                            </label>
                        </div>

                        <div class="form-control mb-5">
                            <label for="remember" class="label cursor-pointer justify-start">
                                <input type="checkbox" class="checkbox checkbox-primary" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                <span class="label-text ml-4">Angemeldet bleiben</span>
                            </label>
                        </div>

                        <div class="card-actions justify-center">
                            <button type="submit" class="btn gap-2 btn-primary w-full normal-case">Anmelden
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </button>
                        </div>
                    </form>
                    <div class="card-actions justify-center">
                        <a class="w-full" href="{{ route('register') }}">
                            <button class="btn gap-2 btn-ghost w-full normal-case">
                                Noch kein Konto?
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
