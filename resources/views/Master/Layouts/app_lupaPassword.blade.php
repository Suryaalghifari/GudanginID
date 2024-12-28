<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('/assets/default/web/LogoEdit.png')}}" />
  <title>@yield('title', 'Reset Password')</title>

  <title>  | </title>

  <link id="style" href="{{ url('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- Link to CSS -->
   <link href="{{url('/assets/css/style.css')}}" rel="stylesheet" />
   <link href="{{url('/assets/css/dark-style.css')}}" rel="stylesheet" />
   <link href="{{url('/assets/css/transparent-style.css')}}" rel="stylesheet">
   <link href="{{url('/assets/css/skin-modes.css')}}" rel="stylesheet" />

   <!--- FONT-ICONS CSS -->
    <link href="{{url('/assets/css/icons.css')}}" rel="stylesheet" />
    

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('/assets/colors/color1.css')}}" />
        
    <style>
         html,body{
            overflow: auto;
        }
    </style>
</head>
<body class="app sidebar-mini ltr">
     <!-- BACKGROUND-IMAGE -->
    <div class="login-img">
        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{url('/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                @yield('content')
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{url('/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{url('/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SWEET-ALERT JS -->
    <script src="{{url('/assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{url('/assets/js/sweet-alert.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{url('/assets/js/show-password.min.js')}}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{url('/assets/js/generate-otp.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{url('/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{url('/assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{url('/assets/js/custom.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('status') === 'success')
        <script>
            Swal.fire({
                title: "Password Berhasil Di Ubah!",
                text: '{{ session("message", "Okeey, Pasword Berhasil Di Ubah.") }}',
                icon: "success", 
                confirmButtonText: "OK",
            });
        </script>
        @endif

        @if (session('status') === 'error')
        <script>
            Swal.fire({
                title: "Reset Password Gagal!",
                text: '{{ session("message", "Terjadi kesalahan saat kirim Link.") }}',
                icon: "error", 
                confirmButtonText: "Coba Lagi",
            });
        </script>
        @endif

        @if ($errors->any())
        <script>
            Swal.fire({
                title: "Input Tidak Valid!",
                text: '{{ $errors->first() }}', // Tampilkan pesan error pertama
                icon: "error", 
                confirmButtonText: "OK",
            });
        </script>
        @endif

        @yield('scripts')
    </body>

</html>
