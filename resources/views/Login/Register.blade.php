@extends('Master.layouts.app_register')

@section('title', 'Register')

@section('content')

<div class="container-login100">
    <div class="wrap-login100 p-6">
         <div class="d-flex justify-content-center align-items-center">
                <img src="{{url('/assets/default/web/LogoEdit.png')}}" height="75px" class="" alt="logo">
         </div>
         <div class="text-center">
            <h4 class="fw-bold mt-4 text-black text-uppercase text-truncate">FitriHijab<span class="text-gray">| REGISTER</span></h4>
        </div>
        <form action="{{ route('register') }}" method="POST">

            @csrf
             <div class="panel panel-primary">
                <div class="panel-body tabs-menu-body p-0 pt-5">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                             <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-account-box-mail text-muted" aria-hidden="true"></i>
                                </a>
                                <input type="name" name="name" class="form-control" placeholder="Nama Lengkap" autocomplete="off" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="TanggalLahir-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-calendar text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "date" name="tanggallahir" class="form-control" value="{{ old('tanggallahir') }}" placeholder="Tanggal Lahir" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="NoTelepon-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-phone text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "number" name="nomorhandphone" class="form-control" value="{{ old('nomorhandphone') }}" placeholder="No Telepon" autocomplete="off" required>
                            </div>
                             <div class="wrap-input100 validate-input input-group" id="Email-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" autocomplete="off" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Username-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "username" name="username" class="form-control" value="{{ old('username') }}" placeholder="Username" autocomplete="off" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "password" name="password_confirmation" class="form-control"  placeholder="Confirm Password" required>
                            </div>



                            <div class="container-login100-form-btn">
                                <button type="button" class="login100-form-btn btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="login100-form-btn btn btn-primary" id="btnLogin">Sign Up</button>
                            </div>

                           <div class="signup mt-4 text-center">
                                <span class="medium">Sudah Punya Akun?
                                     <a href="{{ route('login') }}" class="text-gray text-decoration-underline">Login Sekarang</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btnLogin').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah pengiriman form langsung

        const form = document.querySelector('form');
        const name = form.name.value.trim();
        const tanggallahir = form.tanggallahir.value.trim();
        const nomorhandphone = form.nomorhandphone.value.trim();
        const email = form.email.value.trim();
        const username = form.username.value.trim();
        const password = form.password.value.trim();
        const password_confirmation = form.password_confirmation.value.trim();

        // Validasi input kosong
        if (!name) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Silakan isi Nama Lengkap Anda!',
            });
        } else if (!tanggallahir) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Silakan isi Tanggal Lahir Anda!',
            });
        } else if (!nomorhandphone) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Silakan isi Nomor Telepon Anda!',
            });
        } else if (!email) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Silakan isi Email Anda!',
            });
        } else if (!username) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Silakan isi Username Anda!',
            });
        } else if (!password) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Silakan isi Password Anda!',
            });
        } else if (password !== password_confirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Password Tidak Sama!',
                text: 'Konfirmasi Password harus sama dengan Password!',
            });
        } else {
            // Jika semua validasi terpenuhi, kirim form
            form.submit();
        }
    });
</script>
@endsection