@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Create Cash")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0 ">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.spending') }}">Pengeluaran</a></li> 
          <li>Create</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Create Pengeluaran</h2>
    @include('components.alert')
    <div class="overflow-x-auto bg-base-100 p-4 rounded-xl shadow-xl">
        <form 
        action="{{ route('admin.spending.store') }}" 
        method="POST"
        enctype="multipart/form-data" 
        class=" grid grid-cols-2 gap-4"
        >
            @csrf
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Keperluan<span class="text-red-400">*</span></span>
                </label>
                <input type="text" name="needs" class="input input-lg input-bordered" value="{{ old('needs') }}" required/>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Tanggal<span class="text-red-400">*</span></span>
                </label>
                <input type="date" name="date" class="input input-lg input-bordered" value="{{ old('date') }}" required/>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Jumlah<span class="text-red-400">*</span></span>
                </label>
                <input id="amount" type="string" name="amount" class="input input-lg input-bordered" onKeyPress="return goodchars(event,'0123456789',this)" value="{{ old('amount') }}" />
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Bukti Pembayaran</span>
                  <span class="label-text-alt">Maksimal ukuran file adalah 10 MB</span>
                </label>
                <input id="input_receipt" type="file" name="receipt" class="file-input file-input-lg file-input-bordered" accept=".jpg, .jpeg, .png, .gif, .pdf" />
                <label class="label">
                    <span id="error_input_receipt" class="label-text font-semibold text-error"></span>
                </label>
            </div>
            <div class="col-span-2 form-control">
                <label class="label">
                    <span class="label-text font-semibold">Preview Bukti Pembayaran</span>
                </label>
                <figure class="bg-base-300 rounded-lg">
                    <img id="receipt_preview" src="{{ asset("assets/images/pp-placeholder.png") }}" alt="Image Content" class="mx-auto max-h-[480px]">
                </figure>
            </div>
            <div class="col-span-2 lg:col-span-1 form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Keterangan</span>
                </label>
                <input type="string" name="description" class="input input-lg input-bordered" value="{{ old('description') }}" />
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
                <button type="reset" class="btn btn-lg btn-cta btn-secondary">Reset</button>
                <button id="btn_submit" type="submit" class="btn btn-lg btn-cta btn-primary">Create</button>
            </div>
        </form>
    </div>
</section>
<script>
    document.getElementById('input_receipt').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let fileSize = e.target.files[0].size;
        let sizeLimit = 10000;
        let fileSizeInKB = (fileSize/1024);
        let reader = new FileReader();

        reader.onload = function() {
            document.getElementById('receipt_preview').setAttribute('src', reader.result);
        };

        if(fileSizeInKB < sizeLimit){
            document.getElementById('btn_submit').removeAttribute('disabled', '');
            document.getElementById('error_input_receipt').innerHTML = "";
        } else {
            document.getElementById('btn_submit').setAttribute('disabled', '');
            document.getElementById('error_input_receipt').innerHTML = "Ukuran gambar melebihi 10mb";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById('receipt_preview').setAttribute('src', './assets/images/pp-placeholder.png');
        }
    });

</script>
@endsection