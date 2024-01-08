@extends('client.layout.template')
@section('title', "Daarul Rahmah - Detail News")
@section('content')
{{-- MISSION --}}

<div class="flex flex-col justify-center items-center bg-slate-500 min-h-[60vh] shadow-xl">
    <h1 class="text-center text-base-100">{{ $data->title }}</h1>
    <div class="flex justify-center items-center flex-wrap gap-4 text-slate-500">
        <span class="flex gap-2 justify-center items-center text-base-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
            </svg>
            {{ \Carbon\Carbon::parse($data->date)->format('l, d F Y') }}
        </span>
        <span class="flex gap-2 justify-center items-center text-base-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
            </svg>
            {{ $data->createdUser }}
        </span>
    </div>
</div>
<section class="container mx-auto mb-6">
    <figure class="-translate-y-[90px] max-w-[320px] md:max-w-[720px] lg:max-w-[980px] max-h-[540px] rounded-lg shadow-xl mx-auto overflow-hidden">
        <img src={{ asset('imageNews/'.$data->image) }} class="transition-transform w-[100%] h-[100%] object-cover" alt="Shoes" />
    </figure>
    <div class="max-w-[320px] md:max-w-[720px] lg:max-w-[980px] mx-auto break-all">
        {!! $data->content !!}
    </div>
</section>
{{-- NEWS --}}
@endsection