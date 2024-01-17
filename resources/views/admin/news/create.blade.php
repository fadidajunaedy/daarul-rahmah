@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Create News")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.news') }}">Berita</a></li> 
          <li>Create</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Create Berita</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl">
        <form 
        action="{{ route('admin.news.store') }}" 
        method="POST"
        enctype="multipart/form-data" 
        class=" grid grid-cols-2 gap-4"
        >
            @csrf
            <div class="col-span-2 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Image<span class="text-red-400">*</span></span>
                  <span class="label-text-alt">Maksimal ukuran gambar adalah 10 MB</span>
                </label>
                <input id="input_image" name="image" type="file" class="file-input file-input-lg file-input-bordered w-full" accept="image/*" max-file-size="1024"/>
                <label class="label">
                    <span id="error_input_image" class="label-text font-semibold text-error"></span>
                </label>
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
                  <span class="label-text font-semibold">Tanggal Acara/Kegiatan<span class="text-red-400">*</span></span>
                </label>
                <input type="date" name="date" class="input input-lg input-bordered" value="{{ old('date') }}" />
            </div>
            <div class="col-span-2 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Content<span class="text-red-400">*</span></span>
                </label>
                <textarea id="myeditorinstance" name="content" class="textarea textarea-lg textarea-bordered"></textarea>
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
                <button type="reset" class="btn btn-lg btn-cta btn-secondary">Reset</button>
                <button id="btn-submit" type="submit" class="btn btn-lg btn-cta btn-primary">Create</button>
            </div>
        </form>
    </div>
</section>
<script>
    document.getElementById('input_image').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileSize = e.target.files[0].size;
        let sizeLimit = 10000;
        let fileSizeInKB = (fileSize/1024);
        let reader = new FileReader();

        reader.onload = function() {
            document.getElementById('image').setAttribute('src', reader.result);
        };

        if(fileSizeInKB < sizeLimit){
            document.getElementById('btn-submit').removeAttribute('disabled', '');
            document.getElementById('error_input_image').innerHTML = "";
        } else {
            document.getElementById('btn-submit').setAttribute('disabled', '');
            document.getElementById('error_input_image').innerHTML = "Ukuran gambar melebihi 10mb";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image').setAttribute('src', './assets/images/pp-placeholder.png');
        }
    });

</script>
@endsection