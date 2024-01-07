@extends('auth.template')
@section('title', "Register")
@section('content')
<div class="p-6 bg-base-100 max-w-lg rounded-lg shadow-xl overflow-hidden">
    <h2>Register</h2>
    <p>Selamat datang di web aplikasi Daarul Rahmah, Silahkan daftar terlebih dahulu</p>
    @include('components.alert')
    <form action="{{ route('register.user') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text font-semibold">Nama</span>
            </div>
            <input type="text" name="name" class="input input-lg input-bordered w-full"  value="{{ old('name') }}"/>
        </label>
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text font-semibold">Username</span>
            </div>
            <input type="text" name="username" class="input input-lg input-bordered w-full"  value="{{ old('username') }}"/>
        </label>
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text font-semibold">Email</span>
            </div>
            <input type="email" name="email" class="input input-lg input-bordered w-full"  value="{{ old('email') }}"/>
        </label>
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text font-semibold">Telepon</span>
            </div>
            <input type="number" name="phone" class="input input-lg input-bordered w-full"  value="{{ old('phone') }}"/>
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text font-semibold">Password</span>
            </div>
            <div class="join">
                <input type="password" name="password" class="input input-lg input-bordered join-item w-full"/>
                <button id="btn_password" type="button" class="btn btn-lg join-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </button>
            </div>
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text font-semibold">Konfirmasi Password</span>
            </div>
            <div class="join">
                <input type="password" name="password_confirmation" class="input input-lg input-bordered join-item w-full"/>
                <button id="btn_password_confirmation" type="button" class="btn btn-lg join-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                </button>
            </div>
        </label>
        <button type="submit" class="btn btn-lg btn-cta btn-primary">Register</button>
        <span class="text-center">Sudah punya akun?&nbsp;<a href={{ route("login") }} class="link">Login</a></span>
    </form>
</div>
<script>
    const btnPassword = document.getElementById("btn_password")
    const inputPassword = document.querySelector("input[name='password']")
    const btnConfirmationPassword = document.getElementById("btn_password_confirmation")
    const inputConfirmationPassword = document.querySelector("input[name='password_confirmation']")
        
    const togglePassword = (inputElement, btnElement) => {
        const type = inputElement.getAttribute("type") === "password" ? "text" : "password"
        inputElement.setAttribute("type", type)
    }

    btnPassword.addEventListener("click", () => {
        togglePassword(inputPassword, btnPassword)
    })

    btnConfirmationPassword.addEventListener("click", () => {
        togglePassword(inputConfirmationPassword, btnConfirmationPassword)
    })

</script>
@endsection