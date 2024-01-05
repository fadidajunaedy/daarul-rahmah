@extends('admin.layout.template')
@section('title', "Daarul Rahmah")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">About</li>
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit About</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4 mb-8">
        <form 
        action="{{ route('admin.about.update') }}"        
        method="POST"
        enctype="multipart/form-data" 
        class="col-span-2 bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Latar Belakang</span>
                </label>
                <textarea name="background" class="textarea textarea-lg textarea-bordered">{{ $data->background }}</textarea>
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Visi</span>
                </label>
                <textarea name="vision" class="textarea textarea-lg textarea-bordered">{{ $data->vision }}</textarea>
            </div>
            
            <div class="col-span-2 flex justify-end gap-2">
                <button type="submit" class="btn btn-lg btn-primary btn-cta">Save Changes</button>
            </div>
        </form>
        <div class="col-span-1 bg-base-100 p-6 rounded-xl shadow-xl flex flex-col gap-2 h-[160px]">
            <div>
                <span class="font-semibold">Updated At</span>
                <p>{{ $data->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-between items-center mb-4">
        <h2 class="font-semibold my-4">About (Misi)</h2>
        <a 
        href="{{ route('admin.about.mision.create')}}"
        class="btn btn-primary btn-cta"
        >Create</a>
    </div>
    <div class="bg-base-100 p-4 rounded-xl shadow-x">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($mision as $m)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $m->title }}</td>
                        <td>{{ $m->description }}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ url('admin/about/mision/'.$m->id).'/edit'}}" class="btn btn-square btn-warning btn-cta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                <button type="button" onclick="modalConfirm{{ $m->id }}.showModal()" class="btn btn-square btn-error btn-cta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <dialog id="modalConfirm{{ $m->id }}" class="modal bg-base-200 bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10">
                        <div class="modal-box prose-lg">
                            <h3 class="font-bold text-lg mb-4 text-center">Konfirmasi Hapus</h3>
                            <p class="text-center">Apakah anda yakin ingin menghapus ?</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <button class="btn">Batal</button>
                                </form>
                                <form action="{{ url('admin/about/mision/'.$m->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error text-white">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </dialog>      
                    @php
                        $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
    </div>
</section>
@endsection