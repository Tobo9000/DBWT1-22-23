@extends('app')
@section('title') Registrieren @endsection
@section('content')
    <!-- Register form -->
    <section id="signup">

        <div class="container-fluid py-8">

            <!--<a class="btn btn-ghost normal-case text-xl" href="">E-Mensa</a>-->
            <div class="card lg:w-6/12 md:w-8/12 sm:w-10/12 w-full m-auto shadow-xl bg-base-100 backdrop-filter backdrop-blur-lg bg-opacity-80">
                <!--<figure><img src="https://placeimg.com/400/400/arch" alt="Register"/></figure>-->
                <div class="card-body">
                    <div class="prose text-center mt-2">
                        <h1>Konto erstellen</h1>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-control w-full my-5">
                            <label for="name" class="label">
                                <span class="label-text">Ihr Name</span>
                            </label>
                            <label class="input-group">
                                <input type="text" class="input input-bordered input-primary @error('name') input-error @enderror w-full input-sm lg:input-md"
                                       id="name" name="name"
                                       aria-describedby="nameHelp" placeholder=""
                                       value="{{ old('name') }}" autocomplete="name" autofocus/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                    </svg>
                                </span>
                            </label>
                            @error('name')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control w-full my-5">
                            <label for="email" class="label">
                                <span class="label-text">Ihre E-Mail-Adresse</span>
                            </label>
                            <label class="input-group">
                                <input type="email" class="input input-bordered input-primary @error('email') input-error @enderror w-full input-sm lg:input-md"
                                       id="email" name="email"
                                       aria-describedby="emailHelp" placeholder=""
                                       value="{{ old('email') }}" autocomplete="email"/>
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

                        <div class="form-control w-full my-5">
                            <label for="password" class="label">
                                <span class="label-text">Ihr Passwort</span>
                            </label>
                            <label class="input-group">
                                <input type="password" class="input input-bordered input-primary @error('password') input-error @enderror w-full input-sm lg:input-md"
                                       id="password" name="password" placeholder=""
                                       autocomplete="new-password"/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                    </svg>
                                </span>
                            </label>

                            @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control w-full my-5">
                            <label for="password_confirmation" class="label">
                                <span class="label-text">Passwort wiederholen</span>
                            </label>
                            <label class="input-group">
                                <input type="password" class="input input-bordered input-primary @error('password_confirmation') input-error @enderror w-full input-sm lg:input-md"
                                       id="password_confirmation" name="password_confirmation" placeholder=""
                                       autocomplete="current-password"/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                    </svg>
                                </span>
                            </label>

                            @error('password_confirmation')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="form-control mb-5">
                            <label for="privacy_policy" class="label cursor-pointer justify-start">
                                <input type="checkbox" class="checkbox checkbox-primary @error('privacy_policy') input-error @enderror" id="privacy_policy" name="privacy_policy" {{ old('privacy_policy') ? 'checked' : '' }}/>
                                <span class="label-text ml-4"><a href="./notyetimplemented" target="_blank" class="link link-primary">Datenschutzbestimmungen</a> akzeptieren</span>
                            </label>
                            @error('privacy_policy')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                            @enderror
                        </div>

                        <div class="card-actions justify-center">
                            <button type="submit" class="btn gap-2 btn-primary w-full normal-case">
                                Konto erstellen
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                        <div class="card-actions justify-center">
                            <a class="w-full" href="{{ route('login') }}">
                                <button class="btn gap-2 btn-ghost w-full normal-case">
                                    Stattdessen anmelden
                                </button>
                            </a>
                        </div>
                </div>
            </div>

        </div>
    </section>
@endsection
