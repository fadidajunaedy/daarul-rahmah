@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Edit Contact")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">Kontak</li>
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Kontak</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4">
        <form 
        action="{{ route('admin.contact.update') }}"        
        method="POST"
        enctype="multipart/form-data" 
        class="col-span-2 bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Alamat</span>
                </label>
                <textarea name="address" class="textarea textarea-lg textarea-bordered">{{ $data->address }}</textarea>
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Telepon</span>
                </label>
                <input type="number" name="phone" class="input input-lg input-bordered" value="{{ $data->phone }}" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Email</span>
                </label>
                <input type="email" name="email" class="input input-lg input-bordered" value="{{ $data->email }}" />
            </div>
            <div class="form-control w-full">
                <div class="flex gap-4 w-full">
                    <div class="w-full">
                        <label class="label">
                            <span class="label-text font-semibold">Latitude</span>
                          </label>
                          <input type="text" name="latitude" class="input input-lg input-bordered w-full" value="{{ $data->latitude }}" />
                    </div>
                    <div class="w-full">
                        <label class="label">
                            <span class="label-text font-semibold">Longitude</span>
                          </label>
                          <input type="text" name="longitude" class="input input-lg input-bordered w-full" value="{{ $data->longitude }}" />
                    </div>
                </div>
            </div>
            <div class="col-span-2 form-control">
                <label class="label">
                    <span class="label-text font-semibold">Map</span>
                </label>
                <div class="rounded-lg shadow-xl overflow-hidden h-80">
                    <iframe class="rounded" width="100%" 
                            height="100%" src="https://maps.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}&hl=es;z=20&amp;output=embed"></iframe>
                </div>
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