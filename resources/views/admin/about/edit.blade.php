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
    <div class="grid grid-cols-3 gap-4">
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
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Misi</span>
                </label>
                <textarea name="mision" class="textarea textarea-lg textarea-bordered">{{ $data->mision }}</textarea>
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
</section>
@endsection