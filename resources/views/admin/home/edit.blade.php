@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Edit Home Content")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">Beranda</li>
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Beranda</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4">
        <form 
        action="{{ route('admin.home.update') }}"        
        method="POST"
        enctype="multipart/form-data" 
        class="col-span-2 bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Headline</span>
                </label>
                <input type="text" name="headline" class="input input-lg input-bordered" value="{{ $data->headline }}" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Body</span>
                </label>
                <textarea name="body" class="textarea textarea-lg textarea-bordered">{{ $data->body }}</textarea>
            </div>
            <div class="col-span-2 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Hero Image ({{ $data->hero }})</span>
                  <span class="label-text-alt">Maksimal ukuran gambar adalah 10 MB</span>
                </label>
                <input id="input_hero" name="hero" type="file" class="file-input file-input-lg file-input-bordered w-full" accept="image/*"/>
            </div>
            <div class="col-span-2 form-control">
                <label class="label">
                    <span class="label-text font-semibold">Preview</span>
                </label>
                <figure class="bg-base-300 rounded-lg">
                    <img id="hero"
                    @if ($data->hero !== null)
                    src={{ asset('assets/images'.'/'.$data->hero) }}
                    @else
                    src={{ asset('assets/images/pp-placeholder.png') }}
                    @endif
                    alt="Image Content"
                    class="mx-auto max-h-[480px]">
                </figure>
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
<script>
    document.getElementById('input_hero').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let reader = new FileReader();

        reader.onload = function() {
            document.getElementById('hero').setAttribute('src', reader.result);
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById('hero').setAttribute('src', './assets/images/pp-placeholder.png');
        }
    });

</script>
@endsection