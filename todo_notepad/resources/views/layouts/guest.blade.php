<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        ToDo Notepad
    </title>

    <!-- BootstrapCSS -->
    <link rel="stylesheet" href="../css/ui.css">

    <!-- Fonts -->
    <link href="../css/global_fonts_for_all.css" rel="stylesheet" />

    <link rel="icon" href="../icons/favicon.ico" type="image/x-icon">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased text-white-100">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-lg overflow-hidden sm:rounded-lg" style="background-color: #0d6efd;
            color:white;
           ">
            {{ $slot }}
        </div>
    </div>
</body>

</html>