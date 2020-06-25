@extends('layouts.main')
@push('menu-rapot', 'menu-item-active')
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-2 mr-5">Data Siswa</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('siswa.index') }}" class="text-muted">Siswa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('siswa.edit', $user->id) }}" class="text-muted">Edit Siswa</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Siswa</h3>
                    </div>
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('siswa.update', $user->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="form-group mb-3">
                                    <div class="alert alert-custom alert-default alert-danger" role="alert">
                                        <div class="alert-text">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" class="form-control" placeholder="Enter NIS" name="nis" value="{{ $user->nis }}">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>date</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}">
                            </div>
                            <div class="form-group">
                                <label>Kompetisi Keahlian</label>
                                <input type="text" class="form-control" placeholder="Enter Kompetisi Keahlian" name="kompetisi_keahlian" value="{{ $user->kompetisi_keahlian }}">
                            </div>
                            <div class="form-group">
                                <label>Rayon</label>
                                <input type="text" class="form-control" placeholder="Enter Rayon" name="rayon" value="{{ $user->rayon }}">
                            </div>
                            <div class="form-group">
                                <label>Rombel</label>
                                <input type="text" class="form-control" placeholder="Enter Rombel" name="rombel" value="{{ $user->rombel }}">
                            </div>
                            <div class="form-group">
                                <label>File Raport</label>
                                <br>
                                <small class="text-danger">Jika Tidak Merubah Mohon Jangan Klik Upload File</small>
                                <input type="file" class="form-control" name="file_rapot" accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                            <!--end: Code-->
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
