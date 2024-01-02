@extends('client.layout.template')
@section('content')
{{-- HERO --}}
<section class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2">
    <div class="flex flex-col justify-center items-start">
        <h1>Daarul Rahmah</h1>
        <p>We have considered our solutions to support every stage of your growth.</p>
        <button class="btn btn-lg btn-primary btn-cta rounded-full">Baca Selengkapnya</button>
    </div>
    <figure class="order-first lg:order-last flex justify-center items-center">
        <img 
        src="{{ asset('assets/img/photos/about7.jpeg') }}" 
        alt="Hero Image"
        class="hero-img rounded-lg"
        >
    </figure>
</section>
{{-- HERO --}}

{{-- MISSION --}}
<section class="container mx-auto px-4 flex flex-col justify-center items-center">
    <p class="text-center">WHAT WE DO?</p>
    <h2 class="text-center mt-4">Our Mission</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3">
        <div class="flex flex-col justify-center items-start p-4">
            <span class="w-[50px] h-[50px] bg-primary rounded-full flex justify-center items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FFFFFF" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
            </span>
            <h3>24/Support</h3>
            <p>We have considered our solutions to support every stage of your growth.</p>
            <a href="" class="link r">
                Learn More
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right inline" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>
        <div class="flex flex-col justify-center items-start p-4">
            <span class="w-[50px] h-[50px] bg-primary rounded-full flex justify-center items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FFFFFF" class="bi bi-shield-check" viewBox="0 0 16 16">
                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56"/>
                    <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
            </span>
            <h3>Secure Payments</h3>
            <p>We have considered our solutions to support every stage of your growth.</p>
            <a href="" class="link r">
                Learn More
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right inline" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>
        <div class="flex flex-col justify-center items-start p-4">
            <span class="w-[50px] h-[50px] bg-primary rounded-full flex justify-center items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FFFFFF" class="bi bi-cloud" viewBox="0 0 16 16">
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                </svg>
            </span>
            <h3>Daily Updates</h3>
            <p>We have considered our solutions to support every stage of your growth.</p>
            <a href="" class="link r">
                Learn More
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right inline" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>
    </div>
</section>
{{-- MISSION --}}

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
    <h2 class="text-center mt-4">FEATURED NEWS</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @foreach ($news as $n)
        <div class="card card-news bg-base-100 shadow-xl overflow-hidden py-4">
            <figure class="max-h-[280px]">
                <img src={{ asset('imageNews/'.$n->image) }} class="hover:scale-125 transition-transform" alt="Shoes" />
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
        </div>
        @endforeach
    </div>
    
</section>
{{-- NEWS --}}
@endsection