@extends('admin.layout.template')
@section('title', "Daarul Rahmah")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.about.edit') }}">About</a></li>
          <li class="mx-0 px-0">Misi</li>
          <li class="mx-0 px-0">{{ $data->id }}</li>
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Misi</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl">
        <form 
        action="{{ url('admin/about/mision/' . $data->id . '/update') }}" 
        method="POST"
        class=" grid grid-cols-2 gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Judul</span>
                </label>
                <input type="text" name="title" class="input input-lg input-bordered" value="{{ $data->title }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Deskripsi</span>
                </label>
                <textarea name="description" class="textarea textarea-lg textarea-bordered">{{ $data->description }}</textarea>
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <button type="submit" class="btn btn-lg btn-cta btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</section>
@endsection