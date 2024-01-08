@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Edit About Mision")
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
    <div class="grid grid-cols-3 gap-4">
        <form 
        action="{{ url('admin/about/mision/' . $data->id . '/update') }}" 
        method="POST"
        class="col-span-2 flex flex-col gap-4 bg-base-100 p-4 rounded-lg shadow-xl"
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
                <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
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