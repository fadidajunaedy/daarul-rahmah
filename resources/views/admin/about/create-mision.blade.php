@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Create About Mision")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.about.edit') }}">About</a></li>
          <li class="mx-0 px-0">Misi</li>
          <li>Create</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Create Misi</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl max-w-2xl">
        <form 
        action="{{ route('admin.about.mision.store') }}" 
        method="POST"
        class="flex flex-col gap-4"
        >
            @csrf
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Judul</span>
                </label>
                <input type="text" name="title" class="input input-lg input-bordered" value="{{ old('title') }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Deskripsi</span>
                </label>
                <textarea name="description" class="textarea textarea-lg textarea-bordered">{{ old('description') }}</textarea>
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <button type="reset" class="btn btn-lg">Reset</button>
                <button type="submit" class="btn btn-lg btn-cta btn-primary">Create</button>
            </div>
        </form>
    </div>
</section>
@endsection