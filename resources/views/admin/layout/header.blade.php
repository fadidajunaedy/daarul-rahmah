<div class="navbar fixed flex justify-between bg-base-100 z-10 shadow-md px-4">
  <div class="navbar-start ">
      <label for="drawer-toggle" class="btn btn-ghost drawer-button lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
      </label>
  </div>
  <div class="navbar-end flex items-center gap-2">
      @if (auth()->user())
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost avatar">
            {{ auth()->user()->username }}
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
            <li>
                <a href="{{ route('admin.profile.edit') }}" class="rounded py-2">
                Profil
                </a>
            </li>
            <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded py-2">Keluar</button>
            </form>
    </li>
        </ul>
      </div>
      @endif
  </div>
</div>