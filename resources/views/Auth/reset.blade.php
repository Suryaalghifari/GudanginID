@extends('Master.layouts.app_LupaPassword')

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
         <div class="d-flex justify-content-center align-items-center">
                <img src="{{url('/assets/default/web/LogoEdit.png')}}" height="75px" class="" alt="logo">
         </div>
         <div class="text-center">
            <h4 class="fw-bold mt-4 text-black text-uppercase text-truncate">FitriHijab<span class="text-gray">| Reset Password</span></h4>
        </div>
         <form action="{{ route('password.update') }}" method="POST">

            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
             <div class="panel panel-primary">
                <div class="panel-body tabs-menu-body p-0 pt-5">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                             <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email text-muted ms-1" aria-hidden="true"></i>
                                </a>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required>
                            </div>
                             <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "password" name="password" class="form-control" placeholder="Password Baru" autocomplete="off" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input type= "password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" autocomplete="off" required>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="button" class="login100-form-btn btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="login100-form-btn btn btn-primary" id="btnSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btnSubmit').addEventListener('click', function(event) {
        event.preventDefault();

        const form = document.querySelector('form');
        const email = form.email.value.trim();
        const password = form.password.value.trim();
        const password_confirmation = form.password_confirmation.value.trim();
        if (!email) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Email Harus Diisi!',
            });
        } else if (!password) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Kosong!',
                text: 'Password Harus Diisi!!',
            });
         } else if (password !== password_confirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Password Tidak Sama!',
                text: 'Konfirmasi Password harus sama dengan Password!',
            });
        } else {
            form.submit();
        }
    });
</script>
@endsection

