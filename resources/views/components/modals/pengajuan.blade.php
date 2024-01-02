<dialog id="modalPengajuan" class="modal bg-base-200 bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10">
    <div class="modal-box prose-sm">
        <h3 class="font-bold text-lg mb-4 text-center">Pengajuan Surat</h3>
        <form action="{{ route('pengajuan.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="w-full grid grid-cols-3 gap-4">
                <label for="instansi_tujuan" class="label-text font-semibold">Instansi Tujuan</label>
                <select name="instansi_tujuan" id="" class="select select-sm select-bordered w-full col-span-2" required>
                    <option disabled selected>Pilih salah satu</option>
                    <option value="kelurahan">Kelurahan</option>
                    <option value="dinas_kependudukan">Dinas Kependudukan / Dukcapil</option>
                    <option value="dinas_agama">Dinas Agama (KUA)</option>
                    <option value="kepolisian">Kepolisian</option>
                    <option value="dinas_kesehatan">Dinas Kesehatan / Rumah Sakit</option>
                    <option value="dinas_pendidikan">Dinas Pendidikan / Sekolah / Kampus</option>
                    <option value="pengadilan">Pengadilan Negeri / Tinggi / Agama</option>
                    <option value="dinas_sosial">Dinas Sosial</option>
                </select>
                <label for="jenis_surat" class="label-text font-semibold">Jenis Surat</label>
                <select name="jenis_surat" id="" class="select select-sm select-bordered w-full col-span-2" required>
                    <option disabled selected>Pilih salah satu</option>
                    <option value="pengajuan_pembuatan_ktp">Surat Pengajuan Pembuatan KTP</option>
                    <option value="pengajuan_beasiswa">Surat Pengajuan Beasiswa</option>
                    <option value="pengantar_nikah">Surat Pengantar Nikah</option>
                    <option value="pengurusan_ahli_waris">Surat Pengurusan Ahli Waris</option>
                    <option value="pengantar_usaha">Surat Pengantar Usaha</option>
                    <option value="izin_acara">Surat Izin Acara (Pernikahan, Khitanan, dll)</option>
                    <option value="keterangan_kelahiran">Surat Keterangan Kelahiran</option>
                    <option value="keterangan_kematian">Surat Keterangan Kematian</option>
                </select>
                <label for="keperluan" class="label-text font-semibold">Keperluan</label>
                <textarea name="keperluan" class="textarea textarea-bordered h-24 w-full col-span-2" required>{{ old('keperluan') }}</textarea>
                <label for="keperluan" class="label-text font-semibold">Data diri</label>
                <input type="text" disabled placeholder="Otomatis dari data akun anda" class="w-full col-span-2 bg-base-100">
            </div>
            <button id="btn-hidden-ajukan" type="submit" class="hidden">Ajukan</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Tutup</button>
            </form>
            <button id="btn-ajukan" class="btn btn-primary">Ajukan</button>
        </div>
    </div>
</dialog>

<script>
    document.getElementById('btn-ajukan').addEventListener('click', function() {
       document.getElementById('btn-hidden-ajukan').click();
   });
</script>