<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Todo Notepad
    </title>

    <!-- BootstrapCSS -->
    <link rel="stylesheet" href="css/ui.css">

    <!-- Fonts -->
    <link href="css/global_fonts_for_all.css" rel="stylesheet" />

    <link rel="icon" href="icons/pencil-square.svg" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <p style="
    color: red;
    margin:15px;
    text-align:left;
    ">
            <b>
                {{ __('mark.my_name') }}
            </b>
    </div>
</body>

</html>
