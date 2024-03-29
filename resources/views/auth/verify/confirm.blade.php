@extends('auth.template')
@section('title', 'Daarul Rahmah - Confirmation Email')
@section('content')
<div class="flex flex-col justify-center items-center">
    @if (session('verified'))
    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="#20c997" class="bi bi-check-circle mb-4" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
    </svg>
    <h2 class="text-center">{{ session('verified') }}</h2>
    <p>Beralih ke Login...</p>
    @endif
</div>
<script>
    setTimeout(function(){
        window.location.href ="{{ route('redirect.logout') }}";
    }, 3000);
</script>
@endsection