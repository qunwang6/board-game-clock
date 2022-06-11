<!DOCTYPE html>
<html 
    x-cloak
    x-data="{ dark: true }"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    :class="dark ? 'dark' : ''"
    >

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A free, customisable n-player browser-based board game clock.">
        <meta name="keywords" content="Board Game, Clock">
        <meta name="author" content="Michael Meadows">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Board Game Clock</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f97316">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#000000">

        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    
    <body
        class="transition ease-in-out duration-200
            bg-white text-gray-700
            dark:bg-black dark:text-gray-300"
        >

        <x-header />


    </body>

</html>
