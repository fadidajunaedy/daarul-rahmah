<div id="navbar" class="navbar transition-transform">
    <div class="container mx-auto px-4">
        <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a>Beranda</a></li>
                <li><a>Tentang Kami</a></li>
                <li><a>Berita</a></li>
                <li><a>Kontak</a></li>
            </ul>
        </div>
        {{-- <a class="btn btn-ghost text-xl">daisyUI</a> --}}
        </div>
        <div class="navbar-end w-[100%] hidden lg:flex items-center">
            <ul class="menu menu-horizontal px-1 items-center">
                <li><a href="{{ route('client') }}" class="{{ Route::is('client') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('client.about') }}" class="{{ Route::is('client.about') ? 'active' : '' }}">Tentang Kami</a></li>
                <li><a href="{{ route('client.news') }}" class="{{ Route::is('client.news*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('client.activity') }}" class="{{ Route::is('client.activity*') ? 'active' : '' }}">Kegiatan</a></li>
                <li><a href="{{ route('client.contact') }}" class="{{ Route::is('client.contact*') ? 'active' : '' }}">Kontak</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin*') ? 'active' : '' }}">Dashboard</a></li>
                @if (auth()->user())
                    <li class="flex">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded py-2">Keluar</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById('navbar').classList.remove('fixed');
        document.getElementById('navbar').classList.add('absolute');
        document.getElementById('navbar').classList.remove('bg-base-100');
        document.getElementById('navbar').classList.remove('shadow-lg');
        document.getElementById('navbar').classList.add('py-4');

        document.getElementById('navbar').classList.add('text-white');

        document.querySelector(".active").classList.add('font-bold');
        document.querySelector(".active").classList.add('bg-none');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            document.getElementById('navbar').classList.add('fixed');
            document.getElementById('navbar').classList.remove('absolute');
            document.getElementById('navbar').classList.add('bg-base-100');
            document.getElementById('navbar').classList.add('shadow-lg');
            document.getElementById('navbar').classList.remove('py-4');

            document.getElementById('navbar').classList.remove('text-white');
            document.querySelector(".active").classList.add('text-primary');
            
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
				document.body.style.paddingTop = navbar_height + 'px';
        } else {
            document.getElementById('navbar').classList.remove('fixed');
            document.getElementById('navbar').classList.add('absolute');
            document.getElementById('navbar').classList.remove('bg-base-100');
            document.getElementById('navbar').classList.remove('shadow-lg');
            document.getElementById('navbar').classList.add('py-4');

            document.getElementById('navbar').classList.add('text-white');
            document.querySelector(".active").classList.remove('text-primary');
            // remove padding top from body
            document.body.style.paddingTop = '0';
        } 
    });
    });
</script>