<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo-daarul-rahmah.png')}}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo-daarul-rahmah.png')}}"/>
    <meta name="description" content="Daarul Rahmah">

    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="Daarul Rahmah">
    <meta property="og:description" content="Daarul Rahmah">
    @vite('resources/css/app.css')
</head>
<body>
    <main class="prose-lg min-h-screen flex justify-center items-center bg-base-200 p-4">
        @yield('content')
    </main>
</body>
</html>