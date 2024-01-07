@extends('admin.layout.template')
@section('title', "Daarul Rahmah")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.activity') }}">Kegiatan</a></li> 
          <li>Create</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Create Kegiatan</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl">
        <form 
        action="{{ route('admin.activity.store') }}" 
        method="POST"
        enctype="multipart/form-data" 
        class=" grid grid-cols-2 gap-4"
        >
            @csrf
            <div class="col-span-2 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Image<span class="text-red-400">*</span></span>
                </label>
                <input id="input_image" name="image" type="file" class="file-input file-input-lg file-input-bordered w-full" />
            </div>
            <div class="col-span-2 form-control">
                <label class="label">
                    <span class="label-text font-semibold">Preview</span>
                </label>
                <figure class="bg-base-300 rounded-lg">
                    <img id="image" src="{{ asset("assets/images/pp-placeholder.png") }}" alt="Image Content" class="mx-auto max-h-[480px]">
                </figure>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Judul<span class="text-red-400">*</span></span>
                </label>
                <input type="text" name="title" class="input input-lg input-bordered" value="{{ old('title') }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Deskripsi<span class="text-red-400">*</span></span>
                </label>
                <input type="text" name="description" class="input input-lg input-bordered" value="{{ old('description') }}" />
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <button type="reset" class="btn btn-lg">Reset</button>
                <button type="submit" class="btn btn-lg btn-cta btn-primary">Create</button>
            </div>
        </form>
    </div>
</section>
<script>
    document.getElementById('input_image').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let reader = new FileReader();

        reader.onload = function() {
            document.getElementById('image').setAttribute('src', reader.result);
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image').setAttribute('src', './assets/images/pp-placeholder.png');
        }
    });

</script>
@endsection