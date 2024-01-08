@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Create Cash")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.cash') }}">Kas</a></li> 
          <li>Create</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Create Kas</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl">
        <form 
        action="{{ route('admin.cash.store') }}" 
        method="POST"
        class=" grid grid-cols-2 gap-4"
        >
            @csrf
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Sumber<span class="text-red-400">*</span></span>
                </label>
                <input type="text" name="source" class="input input-lg input-bordered" value="{{ old('title') }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Tanggal<span class="text-red-400">*</span></span>
                </label>
                <input type="date" name="date" class="input input-lg input-bordered" value="{{ old('date') }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Jumlah<span class="text-red-400">*</span></span>
                </label>
                <input id="amount" type="string" name="amount" class="input input-lg input-bordered" onKeyPress="return goodchars(event,'0123456789',this)" value="{{ old('amount') }}" />
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <button type="reset" class="btn btn-lg">Reset</button>
                <button type="submit" class="btn btn-lg btn-cta btn-primary">Create</button>
            </div>
        </form>
    </div>
</section>
@endsection