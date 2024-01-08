@extends('client.layout.template')
@section('title', "Daarul Rahmah - Activity")
@section('content')
<div class="flex flex-col justify-center items-center bg-slate-500 min-h-[60vh] shadow-xl px-4 py-6">
    <h1 class="text-center text-base-100">Kegiatan Daarul Rahmah</h1>
</div>
<section class="container mx-auto px-4 flex flex-col justify-center items-center py-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @foreach ($activity as $a)
        <div class="overflow-hidden">
            <figure class="h-[280px] overflow-hidden rounded-lg shadow-xl">
                <img src={{ asset('imageActivity/'.$a->image) }} class="object-cover object-center w-[100%] h-[100%]" alt="Shoes" />
            </figure>
            <div class="py-6">
                <h3>{{ $a->title }}</h3>
                <p>{{ $a->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination my-6 mx-auto flex justify-center">
        {{ $activity->links() }}
    </div>
</section>
@endsection