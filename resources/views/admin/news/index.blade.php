@extends('admin.layout.template')
@section('title', "Daarul Rahmah - News")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">Berita</li> 
          <li>List</li>
        </ul>
    </div>
    <div class="w-full flex justify-between items-center mb-4">
        <h2 class="font-semibold my-4">Berita</h2>
        <a 
        href="{{ route('admin.news.create')}}"
        class="btn btn-primary btn-cta"
        >Create</a>
    </div>
    @include('components.alert')
    <div class="bg-base-100 p-4 rounded-xl shadow-xl">
        <div class="w-full mb-4 flex flex-col lg:flex-row justify-end gap-4">
            <a href="{{ route('admin.news.export') }}" class="btn btn-secondary btn-cta ml-auto">Export CSV</a>
            <div class="divider divider-horizontal mx-0 hidden lg:flex"></div>
            <form action="{{ route('admin.news') }}" method="GET" class="flex items-center gap-2">
                @csrf
                <input type="text" name="keyword" value="{{ Request::get('keyword') }}" class="input input-bordered w-full" placeholder="Cari berdasarkan judul...">
                <button type="submit" class="btn btn-primary btn-cta">Search</button>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Image</th>
                        <th>Judul</th>
                        <th>Tanggal Kegiatan/Acara</th>
                        <th>Konten</th>
                        <th>Diunggah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data))
                    @php
                        $i = $data->firstItem();
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>
                            <img src="{{ asset('imageNews/'.$item->image) }}" alt="{{ $item->title }}" class="max-w-[100px] rounded mx-auto">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date)->format('l, d F Y') }}</td>
                        <td class="">{{ substr(strip_tags($item->content), 0, 20) . '...' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ url('/news/'.$item->title) }}" target="_blank" class="btn btn-square btn-primary btn-cta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </a>
                                <a href="{{ url('admin/news/'.$item->id).'/edit'}}" class="btn btn-square btn-warning btn-cta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                <button type="button" onclick="modalConfirm{{ $item->id }}.showModal()" class="btn btn-square btn-error btn-cta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFFFFF" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <dialog id="modalConfirm{{ $item->id }}" class="modal bg-base-200 bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10">
                        <div class="modal-box prose-lg bg-base-100">
                            <h3 class="font-bold text-lg mb-4 text-center">Konfirmasi Hapus</h3>
                            <p class="text-center">Apakah anda yakin ingin menghapus ?</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <button class="btn">Batal</button>
                                </form>
                                <form action="{{ url('admin/news/'.$item->id)}}" method="POST">
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
                    @endif
                </tbody>
            </table>
        </div>
        <div class="pagination mt-4">
            {{ $data->links() }}
        </div>
        @if (!count($data))
            <div class="w-full flex justify-center items-center p-6 text-slate-400">
                Data masih kosong
            </div>
        @endif
    </div>
</section>
@endsection