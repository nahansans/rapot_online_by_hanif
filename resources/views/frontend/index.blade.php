@extends('layouts.main')

@push('menu-rapot', 'menu-item-active')

@section('content')

<!--begin::Entry-->
<div class="d-flex flex-row">
    <!--begin::Aside-->
    <div class="flex-row-auto m-auto">
        <!--begin::Profile Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Contact-->
                <div class="py-9">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">NIS:</span>
                        <a href="#" class="text-muted text-hover-primary">{{ $user->nis }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Nama:</span>
                        <span class="text-muted">{{ $user->name }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="font-weight-bold mr-2">Tanggal Lahir:</span>
                        <span class="text-muted">{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d, F Y') }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Kompetisi Keahlian:</span>
                        <span class="text-muted">{{ $user->kompetisi_keahlian }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Rayon:</span>
                        <span class="text-muted">{{ $user->rayon }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Rombel:</span>
                        <span class="text-muted">{{ $user->rombel }}</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <a class="btn btn-primary btn-block" href="{{ asset($user->file_rapot) }}" target="_blank">CETAK RAPOT</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <a class="btn btn-warning btn-block" href="{{ route('home') }}">KEMBALI</a>
                    </div>
                </div>
                <!--end::Contact-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Profile Card-->
    </div>
    <!--end::Aside-->
</div>
<!--end::Entry-->
@endsection

@push('push-script')
    <script src="{{ asset('assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
@endpush
