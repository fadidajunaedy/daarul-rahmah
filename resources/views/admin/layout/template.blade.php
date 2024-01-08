<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div class="prose-lg drawer drawer-mobile lg:drawer-open p-0">
        <input id="drawer-toggle" type="checkbox" class="drawer-toggle" />
        @include('admin.layout.header')
        <div class="drawer-content overflow-x-hidden bg-base-200 pt-[10vh]">
            <div class="px-6 py-6 min-h-[90vh] overflow-x-hidden">
                @yield('content')
            </div>
        </div> 
        @include('admin.layout.sidebar')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('./assets/js/jquery.maskMoney.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/yspc98il5czeyj7ymmq271jpppafq8x67acakgq8j6bi3kv4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'powerpaste advcode table lists checklist',
        toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
    });

    function getkey(e) {
        if (window.event)
            return window.event.keyCode;
        else if (e)
            return e.which;
        else
            return null;
    }

    function goodchars(e, goods, field) {
        let key, keychar;
        key = getkey(e);
        if (key == null) return true;
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
        
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
            return true;    
        if (key == 13) {
            let i;
            for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
            break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
        };
        // else return false
        return false;
    }
    
    $('#amount').maskMoney({thousands:'.', decimal:',', precision:0});
    </script>
</body>
</html>