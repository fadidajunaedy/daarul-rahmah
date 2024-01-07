@extends('client.layout.template')
@section('content')
<div class="flex flex-col justify-center items-center bg-slate-500 text-base-200 min-h-[60vh] shadow-xl">
    <h1 class="text-center text-base-100">Tentang Kami</h1>
</div>
<section class="container mx-auto px-4 py-6 grid grid-cols-1 lg:grid-cols-2 ">
    <div class="flex flex-col justify-center items-start lg:pr-12 py-6">
        <h2>Latar Belakang</h2>
         <p class="whitespace-pre-line break-all">
            {!! $about->background !!}
         </p>
    </div>
    <figure class="order-first lg:order-last flex justify-center items-center">
        <img 
        src="{{ asset('assets/img/photos/about7.jpeg') }}" 
        alt="Hero Image"
        class="rounded-lg"
        >
    </figure>
</section>
<div class="flex flex-col justify-center items-center bg-slate-500 text-base-200 min-h-[60vh] shadow-xl px-4 py-6">
    <h2 class="text-center break-all text-base-100">Visi</h2>
    <q class="text-center max-w-2xl">
        {!! $about->vision !!}
    </q>
</div>
{{-- MISSION --}}
<section class="container mx-auto px-4 flex flex-col justify-center items-center px-4 py-6">
    <h2 class="text-center mt-4">Misi</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2">
        @php
            $i = 1;
        @endphp
        @foreach($mision as $m)
        <div class="flex flex-col items-start p-4">
            <span class="w-[50px] h-[50px] bg-slate-500 text-white font-bold rounded-full flex justify-center items-center mb-4">
               {{ $i }}
            </span>
            <h3>{{ $m->title }}</h3>
            <p>{{ $m->description }}</p>
        </div>
        @php
            $i++
        @endphp
        @endforeach
    </div>
</section>
{{-- MISSION --}}
@endsection