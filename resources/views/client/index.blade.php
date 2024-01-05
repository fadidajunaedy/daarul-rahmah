@extends('client.layout.template')
@section('content')
{{-- HERO --}}
<section class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2">
    <div class="flex flex-col justify-center items-start">
        <h1>{{ $home->headline }}</h1>
        <p>{{ $home->body }}</p>
        <button class="btn btn-lg btn-primary btn-cta rounded-full">Baca Selengkapnya</button>
    </div>
    <figure class="order-first lg:order-last flex justify-center items-center">
        <img 
        src="{{ asset('assets/images/'.$home->hero) }}" 
        alt="Hero Image"
        class="hero-img rounded-lg"
        >
    </figure>
</section>
{{-- HERO --}}

{{-- HOW IT WORKS --}}
<section class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2">
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
</section>
{{-- HOW IT WORKS --}}

{{-- NEWS --}}
<section class="container mx-auto px-4 flex flex-col justify-center items-center py-4">
    <p class="text-center">LIHAT BERITA</p>
    <h2 class="text-center mt-4">Berita Terikini</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @foreach ($news as $n)
        <a href="{{ url('news/'.$n->title) }}" class="card card-news bg-base-100 shadow-xl overflow-hidden">
            <figure class="h-[280px] overflow-hidden">
                <img src={{ asset('imageNews/'.$n->image) }} class="object-cover w-[100%] h-[100%] hover:scale-125 transition-transform" alt="Shoes" />
            </figure>
            <div class="card-body border-b-2">
                {{-- <span class="link">- Category</span> --}}
                <h2 class="card-title">
                    {{ $n->title }}
                </h2>
                <p>{{ substr(strip_tags($n->content), 0, 100) . '...' }}</p>
            </div>
            <div class="text-sm px-8 py-4 flex justify-between items-center">
                {{ \Carbon\Carbon::parse($n->created_at)->diffForHumans() }}
            </div>
        </a>
        @endforeach
    </div>
    <a href="{{ route('client.news') }}" class="btn btn-lg btn-primary btn-cta rounded-full mt-4">Baca lebih banyak</a>
    
</section>
{{-- NEWS --}}
@endsection