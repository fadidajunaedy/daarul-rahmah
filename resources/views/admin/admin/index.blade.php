@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Admin")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">User</li> 
          <li class="mx-0 px-0">Admin</li> 
          <li>List</li>
        </ul>
    </div>
    <div class="w-full flex justify-between items-center mb-4">
        <h2 class="font-semibold my-4">Admin</h2>
        <a 
        href="{{ route('admin.create')}}"
        class="btn btn-primary btn-cta"
        >Create</a>
    </div>
    @include('components.alert')
    <div class="bg-base-100 p-4 rounded-xl shadow-xl">
        <div class="w-full mb-4 flex flex-col lg:flex-row justify-end gap-4">
            <a href="{{ route('admin.export') }}" class="btn btn-secondary btn-cta ml-auto">Export CSV</a>
            <div class="divider divider-horizontal mx-0 hidden lg:flex"></div>
            <form action="{{ route('admin.list') }}" method="GET" class="flex items-center gap-2">
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th class="text-center">Status</th>
                        <th>Created At</th>
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
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->phone }}</td>
                        <td class="text-center">
                            @if ($item->status == 'active')
                            <div class="badge badge-lg bg-success text-white badge-outline py-4 px-4">Aktif</div>
                            @else
                            <div class="badge badge-lg bg-warning text-white badge-outline py-4 px-4">Non Aktif</div>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                        <td>
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ url('admin/'.$item->id).'/edit'}}" class="btn btn-square btn-warning btn-cta">
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
                        <div class="modal-box prose-lg">
                            <h3 class="font-bold text-lg mb-4 text-center">Konfirmasi Hapus</h3>
                            <p class="text-center">Apakah anda yakin ingin menghapus ?</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <button class="btn">Batal</button>
                                </form>
                                <form action="{{ url('admin/'.$item->id) }}" method="POST">
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