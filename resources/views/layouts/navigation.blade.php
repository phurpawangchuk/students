@extends('layouts.header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container-fluid">
        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links and User Dropdown -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Navigation Links -->
                <x-authenticated-content>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('posts') ? 'active' : '' }}"
                            href="{{ url('posts') }}">{{ __('Post') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}"
                            href="{{ url('products') }}">{{ __('Product') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('students') ? 'active' : '' }}"
                            href="{{ url('students') }}">{{ __('Students') }}</a>
                    </li>
                </x-authenticated-content>

                @if(!Auth::user())
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                        href="{{ route('login') }}">{{ __('Log In') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <x-authenticated-content>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if(Auth::user())
                            {{ Auth::user()->name }}
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </x-authenticated-content>
                </li>
            </ul>
        </div>
    </div>
</nav>