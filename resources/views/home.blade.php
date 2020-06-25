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
                        Ambil Raport
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
