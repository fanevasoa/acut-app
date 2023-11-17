<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <wireui:scripts />
    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner/>

<div class="min-h-screen bg-gray-100">
    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
    <livewire:pages.admin.navigation-menu/>
    @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole('responsable_liturgie'))
    <livewire:pages.liturgie.navigation-menu/>
    @endif
    <!-- Page Heading -->


    <!-- Page Content -->
    <main>
{{--        <div class="flex ">--}}
{{--            <aside id="sidebar-multi-level-sidebar"--}}
{{--                   class="  z-40 lg:w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"--}}
{{--                   aria-label="Sidebar">--}}
{{--                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-200">--}}
{{--                    <ul class="space-y-2 font-medium">--}}
{{--                        <li>--}}
{{--                            <a href="#"--}}
{{--                               class="flex items-center p-2 text-gray-900 rounded-lg  dark:hover:bg-gray-400 group">--}}
{{--                                <span class="ml-3">Dashboard</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </aside>--}}
{{--            <div>--}}
                {{ $slot }}
{{--            </div>--}}
{{--        </div>--}}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
