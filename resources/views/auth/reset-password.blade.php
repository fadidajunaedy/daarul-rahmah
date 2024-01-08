@extends('auth.template')
@section('title', "Register")
@section('content')
{{-- <section class="wrapper bg-light min-vh-100">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card h-50 w-25">
            <div class="card-body p-11 text-center d-flex flex-column justify-content-center">
                <h2 class="mb-3 text-start">Reset Password</h2>
                <p class="lead mb-6 text-start">Masukkan password baru anda, dan jangan sampai lupa</p>
                @include('components.alert')
                <form class="text-start mb-3" action="{{ route('register.user') }}" method="POST">
                    @csrf
                    <div class="form-floating password-field mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                        <span id="btn_password" class="password-toggle"><i class="uil uil-eye"></i></span>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating password-field mb-4">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" id="password_confirmation">
                        <span id="btn_password_confirmation" class="password-toggle"><i class="uil uil-eye"></i></span>
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign In</button>
                </form>
                <p class="mb-0">Sudah punya akun? <a href={{ route("login") }} class="hover">Login</a></p>
            </div>
        </div>
    </div>
</section> --}}
<div class="p-6 bg-base-100 max-w-lg rounded-lg shadow-xl overflow-hidden">
    <h2>Reset Password</h2>
    {{-- <p>Masukkan password baru anda</p> --}}
    @include('components.alert')
    <form action="{{ route('password.update') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
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
        <button type="submit" class="btn btn-lg btn-cta btn-primary">Reset</button>
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