@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Edit Cash")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0"><a href="{{ route('admin.spending') }}">Pengeluaran</a></li> 
          <li class="mx-0 px-0">{{ $data->id }}</li> 
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Pengeluaran</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4">
        <form 
        action="{{ url('admin/spending/' . $data->id . '/update') }}" 
        method="POST"
        enctype="multipart/form-data" 
        class="col-span-3 lg:col-span-2 bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4"
        >
            @csrf
            @method('PATCH')
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Keperluan<span class="text-red-400">*</span></span>
                </label>
                <input type="text" name="needs" class="input input-lg input-bordered" value="{{ $data->needs }}" required/>
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Tanggal<span class="text-red-400">*</span></span>
                </label>
                <input type="date" name="date" class="input input-lg input-bordered" value="{{ $data->date }}" required/>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Jumlah<span class="text-red-400">*</span></span>
                </label>
                <input id="amount" type="string" name="amount" class="input input-lg input-bordered" onKeyPress="return goodchars(event,'0123456789',this)" value="{{ $data->amount }}" />
            </div>
            <div class="form-control w-full">
                <label class="label">
                  <span class="label-text font-semibold">Bukti Pembayaran ({{ $data->receipt }})</span>
                </label>
                <input id="input_receipt" type="file" name="receipt" class="file-input file-input-lg file-input-bordered" value="{{ old('receipt') }}"  accept="application/pdf, image/*" />
                <label class="label">
                    <span id="error_input_receipt" class="label-text font-semibold text-error"></span>
                </label>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text font-semibold">Preview Bukti Pembayaran</span>
                </label>
                <figure class="bg-base-300 rounded-lg">
                    <img id="receipt_preview"
                    @if ($data->receipt !== null)
                    src={{ asset('imageReceipt'.'/'.$data->receipt) }}
                    @else
                    src={{ asset('assets/images/pp-placeholder.png') }}
                    @endif
                    alt="Image Content"
                    class="mx-auto max-h-[480px]">
                </figure>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text font-semibold">Keterangan</span>
                </label>
                <input type="string" name="description" class="input input-lg input-bordered" value="{{ $data->description }}" />
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
                <button  id="btn_submit" type="submit" class="btn btn-lg btn-primary btn-cta">Save Changes</button>
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