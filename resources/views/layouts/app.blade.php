<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gestion Rendez-vous') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            {{ Auth::user()->profil }}
            <main class="flex mt-10">
                @if (Auth::user()->profil === 'admin')
                    <div class="flex flex-col justify-between w-auto h-screen bg-gray-500">
                        <div class="min-h-screen min-w-screen flex w-max flex-row bg-gray-100 fixed">
                            <div class="flex flex-col bg-white overflow-hidden">
                                <ul class="flex flex-col pl-8 pr-8 pt-16">
                                    <li>
                                        <a href="{{ url('/admin') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""><i class="fa fa-tachometer-alt"></i> Tableau de Bord</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/users') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""><i class="fa fa-user-shield"></i> Administrateurs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/cliniques') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""><i class="fa fa-clinic-medical"></i> Cliniques</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @elseif (Auth::user()->profil === 'gestion')                    
                    <div class="flex flex-col justify-between w-auto h-screen bg-gray-500">
                        <div class="min-h-screen min-w-screen flex w-max flex-row bg-gray-100 fixed">
                            <div class="flex flex-col bg-white overflow-hidden">
                                <ul class="flex flex-col pl-8 pr-8 pt-16">
                                    <li>
                                        <a href="{{ url('/gestion') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""><i class="fa fa-tachometer-alt"></i> Tableau de Bord</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/gestion/users') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""><i class="fa fa-user-shield"></i> Gestionnaires</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""><i class="fa fa-calendar-check"></i> Rendez-vous</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/gestion/specialite') }}" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                                        <span class=""> <i class="fa fa-medkit"></i> Sp??cialit??s</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                  
                @endif
                <div class="flex flex-col justify-between w-5/6 ml-44">
                     {{ $slot }}
                </div>
            </main>
            <!-- Page Heading -->
        </div>
    </body>
</html>
