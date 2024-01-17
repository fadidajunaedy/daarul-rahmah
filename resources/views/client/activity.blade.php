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
    <div class="pagination my-6 mx-auto flex justify-center">
        {{ $activity->links() }}
    </div>
</section>
@endsection