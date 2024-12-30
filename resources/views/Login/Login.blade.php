@extends('Master.layouts.app_login')

@section('title', 'Login')

@section('content')

<div class="container-login100">
    <div class="wrap-login100 p-6">
         <div class="d-flex justify-content-center align-items-center">
                <img src="{{url('/assets/default/web/LogoEdit.png')}}" height="75px" class="" alt="logo">
         </div>
         <div class="text-center">
            <h4 class="fw-bold mt-4 text-black text-uppercase text-truncate">GudanginID<span class="text-gray">| LOGIN</span></h4>
        </div>
        <form action="{{ route('login') }}" method="POST">

            @csrf
             <div class="panel panel-primary">
                <div class="panel-body tabs-menu-body p-0 pt-5">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                             <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-account text-muted ms-1" aria-hidden="true"></i>
                                </a>
                                <input type="username" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            
                            <!-- Bungkus Google reCAPTCHA -->
                           <div class="wrap-input100 validate-input input-group">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-security text-muted" aria-hidden="true"></i>
                                </a>
                                <div class="form-control" style="border: none; padding: 0;">
                                    {!! htmlFormSnippet() !!}
                                </div>
                            </div>
                            @if($errors->has('g-recaptcha-response'))
                                <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                            @endif

                            <span>Lupa Password? 
                                    <a href="{{ route('password.request') }}" class="text-gray text-decoration-underline">Klik Disini</a>
                            </span>
                            <div class="container-login100-form-btn">
                                <button type="button" class="login100-form-btn btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="login100-form-btn btn btn-primary" id="btnLogin">Login</button>
                            </div>

                            <div class="signup mt-4 text-center">
                                <span class="medium">Belum Punya Akun?
                                     <a href="{{ route('register') }}" class="text-gray text-decoration-underline">Daftar Sekarang</a>
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
<script src="https://www.recaptcha.net/recaptcha/api.js" async defer></script>
@endsection
