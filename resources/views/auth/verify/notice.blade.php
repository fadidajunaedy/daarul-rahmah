@extends('auth.template')
@section('title', 'Daarul Rahmah - Notice Verification Email')
@section('content')
<div class="flex flex-col justify-center items-center">
        @if (session('success'))
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-mailbox-flag" viewBox="0 0 16 16">
            <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8zM5 7c0 .334-.164.264-.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0"/>
            <path d="M4 3h4v1H6.646A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3"/>
        </svg>
        <h2 class="text-center">{{ session('success') }}</h2>
        <a href="{{ route('verification.resend') }}" class="btn btn-lg btn-primary btn-cta rounded-full mb-2">Kirim Ulang</a>
        @endif
        @if (session('success-resend'))
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-mailbox-flag" viewBox="0 0 16 16">
            <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8zM5 7c0 .334-.164.264-.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0"/>
            <path d="M4 3h4v1H6.646A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3"/>
        </svg>
        <h2 class="text-center">{{ session('success-resend') }}</h2>
        <a href={{ route('verification.resend') }} class="btn btn-lg btn-primary btn-cta rounded-full mb-2">Kirim Ulang</a>
        @endif
</div>
@endsection