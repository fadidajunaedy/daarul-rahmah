<dialog id="modalDetail{{ $item->nik }}" class="modal bg-base-200 bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10 prose-sm">
    <div class="modal-box prose-sm">
        <h3 class="font-bold text-lg mb-4 text-center">Detail Warga</h3>
        @php
            $filtered = $dataWarga->where('nik', $item->nik);
        @endphp
        @if (count($dataWarga))
        @foreach ($filtered as $item)
        <div class="grid grid-cols-3">
            <div class="col-span-3 mb-4"> 
                <div class="w-[220px] h-[220px] rounded-lg overflow-hidden shadow-lg mx-auto">
                    <img 
                    @if ($item->foto)
                        src={{ asset('foto'.'/'.$item->foto) }}
                    @else
                        src={{ asset('assets/images/pp-placeholder.png') }}
                    @endif
                    alt="Hero Image"
                    class="w-full h-full object-cover prose-none my-0"
                    />
                </div>
            </div>

            <p class="font-semibold col-span-1">Nomor Kartu Keluarga</p>
            <p class="col-span-2">: {{ $item->nomor_kk }}</p>
            
            <p class="font-semibold col-span-1">NIK</p>
            <p class="col-span-2">: {{ $item->nik }}</p>
            
            <p class="font-semibold col-span-1">Nama</p>
            <p class="col-span-2">: {{ $item->nama }}</p>
            
            <p class="font-semibold col-span-1">Email</p>
            <p class="col-span-2">: {{ $item->email }}</p>

            <p class="font-semibold col-span-1">Nomor Telepon</p>
            <p class="col-span-2">: {{ $item->nomor_telepon }}</p>

            <p class="font-semibold col-span-1">Tempat Lahir</p>
            <p class="col-span-2">: {{ $item->tempat_lahir }}</p>

            @php
                $tanggal_lahir = null;
                if ($item->tanggal_lahir) {
                    $tanggal_lahir = \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id');
                }
            @endphp
            <p class="font-semibold col-span-1">Tanggal Lahir</p>
            <p class="col-span-2">
                @if ($tanggal_lahir)
                    : {{ $tanggal_lahir->isoFormat('DD MMMM YYYY') }} ({{ \Carbon\Carbon::parse($item->tanggal_lahir)->age }} tahun)
                @else
                    :
                @endif
            </p>

            <p class="font-semibold col-span-1">Pekerjaan</p>
            <p class="col-span-2">: {{ $item->pekerjaan }}</p>

            <p class="font-semibold col-span-1">Jenis Kelamin</p>
            <p class="col-span-2">
                @if ($item->jenis_kelamin)
                    :  {{ $item->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan'}}
                @else
                    :
                @endif
            </p>

            <p class="font-semibold col-span-1">Kewarganegaraan</p>
            <p class="col-span-2">: {{ strtoupper($item->kewarganegaraan) }}</p>

            @php
                $agama = str_replace('_', ' ', $item->agama)
            @endphp
            <p class="font-semibold col-span-1">Agama</p>
            <p class="col-span-2">: {{ mb_convert_case($agama, MB_CASE_TITLE, "UTF-8") }}</p>

            <p class="font-semibold col-span-1">Pendidikan Terakhir</p>
            <p class="col-span-2">: {{ strlen($item->pendidikan_terakhir) > 3 ? ucfirst($item->pendidikan_terakhir) : strtoupper($item->pendidikan_terakhir) }}</p>

            @php
                $status = str_replace('_', ' ', $item->status);
            @endphp
            <p class="font-semibold col-span-1">Status</p>
            <p class="col-span-2">: {{ ucwords($status) }}</p>

            <p class="font-semibold col-span-1">Alamat</p>
            <p class="col-span-2">: {{ $item->alamat }}</p>
        </div>
        @endforeach
        @endif
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Tutup</button>
            </form>
        </div>
    </div>
</dialog>  
<script>
   document.addEventListener('DOMContentLoaded', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>