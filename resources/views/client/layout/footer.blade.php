<footer class="bg-base-200 text-base-content">
  <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 px-4 py-12">
    <nav class="flex flex-col gap-2">
      <img src="{{ asset('assets/images/logo-daarul-rahmah.png') }}" class="w-[90px] mb-2" alt="">
      <header class="footer-title">Daarul Rahmah</header> 
      <p class="mt-0">Copyright © 2024 - All right reserved</p>
    </nav> 
    <nav class="flex flex-col gap-4">
      <header class="footer-title">Explore</header> 
      <a href="{{ route('client') }}">Beranda</a>
      <a href="{{ route('client.about') }}">Tentang Kami</a>
      <a href="{{ route('client.news') }}">Berita</a>
      <a href="{{ route('client.activity') }}">Kegiatan</a>
      <a href="{{ route('client.contact') }}">Kontak</a>
    </nav> 
    <nav class="flex flex-col gap-4">
      <header class="footer-title">Alamat</header> 
      <p class="mb-4">{{ $contact->address }}</p>
      <header class="footer-title">Email</header> 
      <p>{{ $contact->email }}</p>
      <header class="footer-title">Telepon</header> 
      <p>{{ $contact->phone }}</p>
    </nav>
  </div>

</footer>