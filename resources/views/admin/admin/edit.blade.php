@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Edit Admin")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">User</li> 
          <li class="mx-0 px-0"><a href="{{ route('admin.list') }}">Admin</a></li> 
          <li>{{ $data->id }}</li>
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Admin</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4">
        <form 
        action="{{ url('admin/' . $data->id . '/update') }}" 
        method="POST"
        class="col-span-3 lg:col-span-2 bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Nama</span>
                </label>
                <input type="text" name="name" class="input input-lg input-bordered" value="{{ $data->name }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Username</span>
                </label>
                <input type="text" name="username" class="input input-lg input-bordered" value="{{ $data->username }}" disabled/>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Email</span>
                </label>
                <input type="email" name="email" class="input input-lg input-bordered" value="{{ $data->email }}" disabled/>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Telepon</span>
                </label>
                <input type="number" name="phone" class="input input-lg input-bordered" value="{{ $data->phone }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
              <label class="label">
                <span class="label-text font-semibold">Status<span class="text-red-400">*</span></span>
              </label>
              <select name="status" class="select select-lg select-bordered">
                  <option selected disabled>Pilih Status</option>
                  <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Aktif</option>
                  <option value="non-active" {{ $data->status == 'non-active' ? 'selected' : '' }}>Non Aktif</option>
              </select>
          </div>
            <div class="col-span-2 flex justify-end gap-2">
                <button type="submit" class="btn btn-lg btn-cta btn-primary">Save Changes</button>
            </div>
        </form>
        <div class="col-span-3 lg:col-span-1 bg-base-100 p-6 rounded-xl shadow-xl flex flex-col gap-2 h-[280px]">
          <div>
              <span class="font-semibold">Created At</span>
              <p>{{ $data->created_at->diffForHumans() }}</p>
          </div>
          <div>
              <span class="font-semibold">Updated At</span>
              <p>{{ $data->updated_at->diffForHumans() }}</p>
          </div>
      </div>
    </div>
</section>
@endsection