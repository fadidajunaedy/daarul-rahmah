@extends('client.layout.template')
@section('content')
<div class="container mx-auto px-4 mt-4 mb-12">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('client') }}">Beranda</a></li> 
          <li class="mx-0 px-0">Tentang Kami</li> 
        </ul>
    </div>
    <div class="flex flex-col justify-center items-center jumbotron h-[50vh] rounded-lg shadow-xl">
        <h1 class="opacity-1">Tentang Kami</h1>
    </div>
</div>
<section class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2">
    <div class="flex flex-col justify-center items-start lg:pr-12">
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
<div class="container mx-auto px-4 mt-4 mb-12">
    <div class="flex flex-col justify-center items-center jumbotron max-h-[50vh] rounded-lg shadow-xl py-8">
        <h2>Visi</h2>
        <q class="text-center max-w-2xl">
            {!! $about->vision !!}
        </q>
    </div>
</div>
{{-- MISSION --}}
<section class="container mx-auto px-4 flex flex-col justify-center items-center">
    <h2 class="text-center mt-4">Misi</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2">
        @php
            $i = 1;
        @endphp
        @foreach($mision as $m)
        <div class="flex flex-col items-start p-4">
            <span class="w-[50px] h-[50px] bg-primary text-white font-bold rounded-full flex justify-center items-center mb-4">
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