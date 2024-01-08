@extends('admin.layout.template')
@section('title', "Daarul Rahmah - Profil")
@section('content')
<section class="min-h-[90vh] w-full">
    <div class="breadcrumbs px-0">
        <ul class="mx-0 px-0 my-0">
          <li class="mx-0 px-0">Profile</li> 
          <li class="mx-0 px-0">{{ $data->id }}</li> 
          <li>Edit</li>
        </ul>
    </div>
    <h2 class="font-semibold my-4 mb-4">Edit Profile</h2>
    @include('components.alert')
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3 lg:col-span-2">
            <form 
            action="{{ route('admin.profile.update') }}" 
            method="POST"
            class="bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4 mb-6"
            >
                @csrf
                @method('PATCH')
                <div class="col-span-2 lg:col-span-1 form-control w-full">
                    <label class="label">
                    <span class="label-text font-semibold">Nama</span>
                    </label>
                    <input type="text" name="name" class="input input-lg input-bordered" value="{{ $data->name }}" />
                </div>
                <div class="col-span-2 lg:col-span-1 form-control w-full">
                    <label class="label">
                    <span class="label-text font-semibold">Username</span>
                    </label>
                    <input type="text" name="username" class="input input-lg input-bordered" value="{{ $data->username }}" />
                </div>
                <div class="col-span-2 lg:col-span-1 form-control w-full">
                    <label class="label">
                    <span class="label-text font-semibold">Email</span>
                    </label>
                    <input type="email" name="email" class="input input-lg input-bordered" value="{{ $data->email }}" disabled/>
                </div>
                <div class="col-span-2 lg:col-span-1 form-control w-full">
                    <label class="label">
                    <span class="label-text font-semibold">Nomor Telepon</span>
                    </label>
                    <input type="number" name="phone" class="input input-lg input-bordered" value="{{ $data->phone }}" />
                </div>
                <div class="col-span-2 flex justify-end gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-lg">Cancel</a>
                    <button type="submit" class="btn btn-lg btn-primary btn-cta">Save Changes</button>
                </div>
            </form>
            <h2>Ubah Password</h2>
            <form action="{{ route('admin.profile.change-password') }}" method="POST" class="bg-base-100 rounded-xl shadow-xl p-4 flex flex-col gap-4">
                @csrf
                <div class="form-control w-full">
                    <div class="label">
                        <span class="label-text font-semibold">Password</span>
                    </div>
                    <div class="join">
                        <input type="password" name="current_password" class="input input-lg input-bordered join-item w-full"/>
                        <button id="btn_current_password" type="button" class="btn btn-lg join-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form-control w-full">
                    <div class="label">
                        <span class="label-text font-semibold">Password Baru</span>
                    </div>
                    <div class="join">
                        <input type="password" name="new_password" class="input input-lg input-bordered join-item w-full"/>
                        <button id="btn_new_password" type="button" class="btn btn-lg join-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form-control w-full">
                    <div class="label">
                        <span class="label-text font-semibold">Konfirmasi Password Baru</span>
                    </div>
                    <div class="join">
                        <input type="password" name="new_password_confirmation" class="input input-lg input-bordered join-item w-full"/>
                        <button id="btn_new_password_confirmation" type="button" class="btn btn-lg join-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="reset" class="btn btn-lg btn-secondary btn-cta">Reset</button>
                        <button type="submit" class="btn btn-lg btn-primary btn-cta">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-span-3 lg:col-span-1 bg-base-100 p-6 rounded-xl shadow-xl flex flex-col justify-center gap-2 h-[180px]">
            <span class="font-semibold">Updated At</span>
            <p>{{ $data->updated_at->diffForHumans() }}</p>
        </div>
    </div>
</section>
<script>
    const btnCurrentPassword = document.getElementById("btn_current_password")
    const inputCurrentPassword = document.querySelector("input[name='current_password']")
    const btnNewPassword = document.getElementById("btn_new_password")
    const inputNewPassword = document.querySelector("input[name='new_password']")
    const btnNewPasswordConfirmation = document.getElementById("btn_new_password_confirmation")
    const inputConfirmationPassword = document.querySelector("input[name='new_password_confirmation']")
        
    const togglePassword = (inputElement, btnElement) => {
        const type = inputElement.getAttribute("type") === "password" ? "text" : "password"
        inputElement.setAttribute("type", type)
    }

    btnCurrentPassword.addEventListener("click", () => {
        togglePassword(inputCurrentPassword, btnCurrentPassword)
    })

    btnNewPassword.addEventListener("click", () => {
        togglePassword(inputNewPassword, btnNewPassword)
    })

    btnNewPasswordConfirmation.addEventListener("click", () => {
        togglePassword(inputConfirmationPassword, btnNewPasswordConfirmation)
    })

</script>
@endsection