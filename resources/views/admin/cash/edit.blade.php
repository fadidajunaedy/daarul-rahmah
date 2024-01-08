@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Edit Cash")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.cash') }}">Kas</a></li> 
          <li class="mx-0 px-0">{{ $data->id }}</li> 
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Kas</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4">
        <form 
        action="{{ url('admin/cash/' . $data->id . '/update') }}" 
        method="POST"
        class="col-span-3 lg:col-span-2 bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Sumber
                </label>
                <input type="text" name="source" class="input input-lg input-bordered" value="{{ $data->source }}" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Tanggal</span>
                </label>
                <input type="date" name="date" class="input input-lg input-bordered" value="{{ $data->date }}" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Jumlah<span class="text-red-400">*</span></span>
                </label>
                <input id="amount" type="string" name="amount" class="input input-lg input-bordered" onKeyPress="return goodchars(event,'0123456789',this)" value="{{ $data->amount }}" />
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
                <button type="submit" class="btn btn-lg btn-primary btn-cta">Save Changes</button>
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