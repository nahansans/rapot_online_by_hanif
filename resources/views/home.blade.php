@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                        <a class="btn btn-primary" href="{{ route('login') }}">
                        Login
                        </a>    
                    @endguest
                    @auth
                    @if (Auth::user()->level === 'SISWA')
                        <a class="btn btn-primary" href="{{ route('rapot') }}">
                        Ambil Rapot
                        </a>
                    @endif
                    <a class="btn btn-danger" href="{{ route('logout') }}">
                    Logout
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
