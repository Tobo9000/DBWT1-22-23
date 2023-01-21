@extends('app')
@section('title') Profil @endsection
@section('content')
    <section id="profile">

        <div class="container-fluid py-8">

            <div class="card lg:w-6/12 md:w-8/12 sm:w-10/12 w-full m-auto shadow-xl bg-base-100 backdrop-blur-lg bg-opacity-80">
                <div class="card-body">
                    <div class="prose text-center mt-2">
                        <h1>Profil</h1>
                    </div>
                    <div>
                        <div class="form-control w-full">
                            <label for="name" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <label class="input-group">
                                <input type="text" class="input input-bordered input-primary w-full input-sm lg:input-md" disabled
                                       id="name" name="name"
                                       value="{{ Auth::user()->name }}"/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                    </svg>
                                </span>
                            </label>
                        </div>
                        <div class="form-control w-full mt-2">
                            <label for="email" class="label">
                                <span class="label-text">E-Mail-Adresse</span>
                            </label>
                            <label class="input-group">
                                <input type="text" class="input input-bordered input-primary w-full input-sm lg:input-md" disabled
                                       id="email" name="email"
                                       value="{{ Auth::user()->email }}"/>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </span>
                            </label>
                            <label class="label pb-0">
                                @if(Auth::user()->hasVerifiedEmail())
                                    <span class="label-text-alt text-success">Verifiziert</span>
                                @else
                                    <span class="label-text-alt text-error">Nicht verifiziert</span>
                                @endif
                            </label>
                        </div>
                        <div class="flex flex-row flex-wrap gap-2 mt-2">
                            <div class="form-control flex-1">
                                <label for="created_at" class="label">
                                    <span class="label-text">Erstellt am</span>
                                </label>
                                <input type="text" class="input input-bordered input-primary w-full input-sm lg:input-md" disabled
                                       id="created_at" name="created_at"
                                       value="{{  Auth::user()->created_at->formatLocalized('%d.%m.%Y %H:%I') }}"/>
                            </div>
                            <div class="form-control flex-1">
                                <label for="updated_at" class="label">
                                    <span class="label-text">Letzte Änderung</span>
                                </label>
                                <input type="text" class="input input-bordered input-primary w-full input-sm lg:input-md" disabled
                                       id="updated_at" name="updated_at"
                                       value="{{  Auth::user()->updated_at->formatLocalized('%d.%m.%Y %H:%I') }}"/>
                            </div>
                        </div>
                        <div class="mt-6 prose">
                            <p>Sie haben sich {{ Auth::user()->anzahlanmeldungen }} mal angemeldet.</p>
                        </div>
                        @if(Auth::user()->admin)
                            <div class="prose prose-em">
                                <p>Sie sind <em>Administrator</em>.</p>
                            </div>
                        @endif
                    </div>
                    @if(!Auth::user()->admin)
                        <div class="card-actions justify-end mt-4">
                            <form method="POST" action="{{ route('deleteAccount') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm gap-2 btn-ghost normal-case">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                    Konto löschen
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
