<header class="sticky top-0 z-40">
    <div class="navbar bg-base-100 backdrop-filter backdrop-blur-lg bg-opacity-50 border-b border-base-200">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>

                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="{{ route('home') }}"
                           class="{{ request()->routeIs('home') ? 'active' : '' }}">Startseite</a></li>
                    <li><a href="{{ route('meals') }}"
                           class="{{ request()->routeIs('meals') ? 'active' : '' }}">Speisen</a></li>
                    <li><a href="{{ route('reviews') }}"
                           class="{{ request()->routeIs('reviews') ? 'active' : '' }}">Bewertungen</a></li>
                    {{--<li><a href="{{ route('home').'#numbers' }}">
                            Zahlen</a></li>--}}
                </ul>

            </div>
            <a class="btn btn-ghost normal-case text-xl" href="{{ route('home') }}">E-Mensa</a>
        </div>
        <div class="navbar-center hidden lg:flex">

            <ul class="menu menu-horizontal px-2">
                <li class="mx-1"><a href="{{ route('home') }}"
                                    class="{{ request()->routeIs('home') ? 'active' : '' }}">Startseite</a></li>
                <li class="mx-1"><a href="{{ route('meals') }}"
                                    class="{{ request()->routeIs('meals') ? 'active' : '' }}">Speisen</a></li>
                <li class="mx-1"><a href="{{ route('reviews') }}"
                                    class="{{ request()->routeIs('reviews') ? 'active' : '' }}">Bewertungen</a></li>
                {{--<li class="mx-1"><a href="{{ route('home').'#numbers' }}">Zahlen</a></li>--}}
            </ul>

        </div>
        <div class="navbar-end">
            <select class="select select-bordered select-sm bg-transparent" data-choose-theme>
                <option value="fhtheme" selected>Light</option>
                <option value="dark">Dark</option>
                <option value="cyberpunk">Cyberpunk</option>
                <option value="wireframe">Wireframe</option>
            </select>

            @if (Auth::user())
                <div class="ml-2 dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost normal-case gap-2">
                        <span>
                            {{ Str::limit(Auth::user()->name, 25) }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </label>
                    <ul tabindex="0" class="dropdown-content menu menu-compact mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="{{ route('profile') }}" class="gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                Profil</a></li>
                        <li><a href="{{ route('reviews', ['user' => Auth::id()]) }}" class="gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                Meine Bewertungen</a></li>
                        <li><a href="{{ route('logout') }}" class="gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                Abmelden</a></li>
                    </ul>
                </div>
            @else
                <div class="ml-2">
                    <a href="{{ route('login') }}" class="btn btn-ghost normal-case gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Anmelden</a>
                </div>
            @endif
        </div>
    </div>
</header>
