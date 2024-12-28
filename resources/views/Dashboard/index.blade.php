@extends('Master.Layouts.App')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Selamat Datang di Dashboard</h1>
            <p>Ini adalah halaman utama setelah login.</p>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Akun</h5>
                    <p class="card-text">Nama: {{ Auth::user()->name }}</p>
                    <p class="card-text">Email: {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
