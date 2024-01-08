@extends('auth.template')
@section('title', "Daarul Rahmah - Login")
@section('content')
<div class="p-6 bg-base-100 max-w-lg rounded-lg shadow-xl overflow-hidden">
    <h2>Login</h2>
    <p>Selamat datang di web aplikasi Daarul Rahmah, Silahkan masuk dengan email yang sudah terdaftar</p>
    @include('components.alert')
    <form action="{{ route('login.user') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text font-semibold">Email</span>
            </div>
            <input type="email" name="email" class="input input-lg input-bordered w-full"/>
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
        <button type="submit" class="btn btn-lg btn-cta btn-primary">Login</button>
        <a href={{ route('password.request') }} class="link text-center">Lupa Password?</a>
        <span class="text-center">Belum punya akun?&nbsp;<a href={{ route("register") }} class="link">Register</a></span>
    </form>
</div>
<script>
    const btnPassword = document.getElementById("btn_password")
    const inputPassword = document.querySelector("input[name='password']")
        
    const togglePassword = (inputElement, btnElement) => {
        const type = inputElement.getAttribute("type") === "password" ? "text" : "password"
        inputElement.setAttribute("type", type)
    }

    btnPassword.addEventListener("click", () => {
        togglePassword(inputPassword, btnPassword)
    })

</script>
@endsection