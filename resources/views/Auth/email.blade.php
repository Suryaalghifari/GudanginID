@extends('Master.layouts.app_email')

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
         <div class="d-flex justify-content-center align-items-center">
                <img src="{{url('/assets/default/web/LogoEdit.png')}}" height="75px" class="" alt="logo">
         </div>
         <div class="text-center">
            <h4 class="fw-bold mt-4 text-black text-uppercase text-truncate">GudanginID<span class="text-gray">| Reset Password</span></h4>
        </div>
        <form action="{{ route('password.email') }}" method="POST">

            @csrf
             <div class="panel panel-primary">
                <div class="panel-body tabs-menu-body p-0 pt-5">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                             <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email text-muted ms-1" aria-hidden="true"></i>
                                </a>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="button" class="login100-form-btn btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="login100-form-btn btn btn-primary" id="btnLogin">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @endsection

@section('scripts')

