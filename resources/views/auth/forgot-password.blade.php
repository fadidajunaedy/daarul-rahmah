@extends('auth.template')
@section('title', 'Lupa Password')
@section('content')
<div class="p-6 bg-base-100 max-w-lg rounded-lg shadow-xl overflow-hidden">
    <h2>Lupa Password ?</h2>
    <p>Masukkan email anda yang sudah terdaftar</p>
    @include('components.alert')
    <form action="{{ route('password.email') }}" method="POST" class="flex flex-col gap-4">
        @csrf
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text font-semibold">Email</span>
            </div>
            <input type="email" name="email" class="input input-lg input-bordered w-full"/>
        </label>
        <button type="submit" class="btn btn-lg btn-cta btn-primary">Submit</button>
        <span class="text-center">Belum punya akun?&nbsp;<a href={{ route("register") }} class="link">Register</a></span>
    </form>
</div>
@endsection