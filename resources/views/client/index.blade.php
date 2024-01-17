@extends('client.layout.template')
@section('title', "Daarul Rahmah")
@section('content')
{{-- HERO --}}
<section class="grid grid-cols-1 lg:grid-cols-2">
    <div class="flex flex-col justify-center items-start px-4 lg:ml-[160px]">
        <h1>{{ $home->headline }}</h1>
        <p>{{ $home->body }}</p>
        <a href="{{ route('client.about') }}" class="btn btn-lg btn-primary btn-cta">Baca Selengkapnya</a>
    </div>
    <figure class="w-full h-full bg-blue-200 order-first lg:order-last flex justify-center items-center">
        <img 
        src="{{ asset('assets/images/'.$home->hero) }}" 
        class="w-full h-full object-cover"
        alt="Hero Image"
        >
    </figure>
</section>
{{-- HERO --}}

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
            <span class="w-[50px] h-[50px] bg-[#5E81AC] text-white font-bold rounded-full flex justify-center items-center mb-4">
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

{{-- HOW IT WORKS --}}
{{-- <section class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2">
    <figure class="flex justify-center items-center">
        <img 
        src="{{ asset('assets/img/photos/about7.jpeg') }}" 
        alt="Hero Image"
        class="hero-img rounded-lg"
        >
    </figure>
    <div class="flex flex-col justify-center items-start px-12">
        <h2>How It Works?</h2>
        <p>So here are three working steps why our valued customers choose us.</p>
        <ol>
            <li>
                <h3>1. Collect Ideas</h3>
                <p class="ml-6">Nulla vitae elit libero pharetra augue dapibus. Praesent commodo cursus.</p>
            </li>
            <li>
                <h3>2. Data Analysis</h3>
                <p class="ml-6">Vivamus sagittis lacus vel augue laoreet. Etiam porta sem malesuada magna.</p>
            </li>
            <li>
                <h3>3. Finalize Product</h3>
                <p class="ml-6">Cras mattis consectetur purus sit amet. Aenean lacinia bibendum nulla sed.</p>
            </li>
        </ol>
    </div>
</section> --}}
{{-- HOW IT WORKS --}}

{{-- KEGIATAN --}}
<section class="container mx-auto px-4 flex flex-col justify-center items-center py-4">
    <h2 class="text-center mt-4">Kegiatan</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @foreach ($activity as $a)
        <div class="overflow-hidden">
            <button type="button" onclick="modalDetailImage{{ $a->id }}.showModal()" class="h-[280px] w-[100%] overflow-hidden rounded-lg shadow-xl cursor-pointer">
                <img src={{ asset('imageActivity/'.$a->image) }} class="object-cover object-center w-[100%] h-[100%] hover:scale-125 transition-transform" alt="Shoes" />
            </button>
            <div class="py-6">
                <h3>{{ $a->title }}</h3>
                <p>{{ $a->description }}</p>
            </div>
            <dialog id="modalDetailImage{{ $a->id }}" class="modal bg-base-200 bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10">
                <form method="dialog" class="absolute right-6 top-6 z-99">
                    <button class="btn btn-sm btn-circle btn-ghost bg-slate-500 text-white font-bold">✕</button>
                </form>
                <div class="modal-box modal-box-image h-[90vh] p-0 max-w-5xl overflow-hidden rounded">
                    <img src={{ asset('imageActivity/'.$a->image) }} class="object-contain object-center w-[100%] h-[100%]"/>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                  </form>
            </dialog>
        </div>
        @endforeach
    </div>
    <a href="{{ route('client.activity') }}" class="btn btn-primary btn-cta mt-4">Lihat lebih banyak</a>
</section>


{{-- NEWS --}}
<section class="container mx-auto px-4 flex flex-col justify-center items-center py-4">
    <h2 class="text-center mt-4">Berita Terikini</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @foreach ($news as $n)
        <a href="{{ url('news/'.$n->title) }}" class="card card-news bg-base-100 shadow-xl overflow-hidden">
            <figure class="h-[280px] overflow-hidden">
                <img src={{ asset('imageNews/'.$n->image) }} class="object-cover object-center w-[100%] h-[100%] hover:scale-125 transition-transform" alt="Shoes" />
            </figure>
            <div class="card-body border-b-2">
                {{-- <span class="link">- Category</span> --}}
                <h3 class="card-title">
                    {{ $n->title }}
                </h3>
                <p>{{ substr(strip_tags($n->content), 0, 100) . '...' }}</p>
            </div>
            <div class="text-sm px-8 py-4 flex justify-between items-center">
                {{ \Carbon\Carbon::parse($n->created_at)->format('d F Y') }}
            </div>
        </a>
        @endforeach
    </div>
    <a href="{{ route('client.news') }}" class="btn btn-primary btn-cta mt-4">Baca lebih banyak</a>
</section>
@endsection