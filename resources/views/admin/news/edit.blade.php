@extends('admin.layout.template')
@section('title', "Daarul Rahmah")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.news') }}">Berita</a></li> 
          <li class="mx-0 px-0">{{ $data->id }}</li> 
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Berita</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl">
        <form 
        action="{{ url('admin/news/' . $data->id . '/update') }}" 
        method="POST"
        enctype="multipart/form-data" 
        class=" grid grid-cols-2 gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="col-span-2 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Image ({{ $data->image }})</span>
                </label>
                <input id="input_image" name="image" type="file" class="file-input file-input-lg file-input-bordered w-full" />
            </div>
            <div class="col-span-2 form-control">
                <label class="label">
                    <span class="label-text font-semibold">Preview</span>
                </label>
                <figure class="bg-base-300 rounded-lg">
                    <img id="image"
                    @if ($data->image !== null)
                    src={{ asset('imageNews'.'/'.$data->image) }}
                    @else
                    src={{ asset('assets/images/pp-placeholder.png') }}
                    @endif
                    alt="Image Content"
                    class="mx-auto max-h-[480px]">
                    
                </figure>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Judul</span>
                </label>
                <input type="text" name="title" class="input input-lg input-bordered" value="{{ $data->title }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Tanggal Acara/Kegiatan</span>
                </label>
                <input type="date" name="date" class="input input-lg input-bordered" value="{{ $data->date }}" />
            </div>
            <div class="col-span-2 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Konten</span>
                </label>
                <textarea id="myeditorinstance" name="content" class="textarea textarea-lg textarea-bordered">
                    {{ $data->content }}
                </textarea>
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
                <button type="submit" class="btn btn-lg btn-primary btn-cta">Save Changes</button>
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