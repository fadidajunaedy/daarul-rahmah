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
    @include('client.layout.navbar')
    <main class="prose-lg overflow-x-hidden">
        @yield('content')
    </main>
    @include('client.layout.footer')
</body>
</html>