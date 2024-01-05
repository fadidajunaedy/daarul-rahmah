@extends('client.layout.template')
@section('content')
{{-- MISSION --}}
<div class="container mx-auto px-4 mt-4 mb-8">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('client') }}">Beranda</a></li> 
          <li class="mx-0 px-0">Berita</li> 
        </ul>
    </div>
    <div class="flex flex-col justify-center items-center jumbotron min-h-[50vh] rounded-lg shadow-xl">
        <h1 class="text-center">Daarul Rahmah Dalam Berita</h1>
    </div>
</div>
<section class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
                {{ \Carbon\Carbon::parse($n->created_at)->format('d F Y') }}
            </div>
        </a>
        @endforeach
    </div>
    <div class="pagination my-6 mx-auto flex justify-center">
        {{ $news->links() }}
    </div>
</section>
{{-- NEWS --}}
@endsection