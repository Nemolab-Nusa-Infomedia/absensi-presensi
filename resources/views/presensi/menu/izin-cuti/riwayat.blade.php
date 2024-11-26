@extends('presensi.components.layout')

@section('content')
<section class="text-center my-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('presensi-home') }}">
                    <img src="{{ asset('assets/images/apk-presensi/menu/home.png') }}" alt="">
                    <p>Beranda</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('laporan-presensi') }}">
                    <img src="{{ asset('assets/images/apk-presensi/menu/laporan.png') }}" alt="">
                    <p>Laporan Presensi</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('izin-cuti') }}">
                    <img src="{{ asset('assets/images/apk-presensi/menu/cuti.png') }}" alt="">
                    <p>Izin Cuti</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('akun') }}">
                    <img src="{{ asset('assets/images/apk-presensi/menu/people.png') }}" alt="">
                    <p>Akun</p>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="col-12">
    <div class="card">
        <div class="card-header d-flex">
            <h5 class="card-title">Riwayat Pengajuan</h5>
            <div class="ms-auto">
                <a href="javascript:void(0);" class="text-primary">Bersihkan Riwayat
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-heading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen" aria-expanded="true" aria-controls="panelsStayOpen">
                                    {{-- {{ $ajuanGroup->first()->name }} --}}
                                </button>
                            </h2>
                            @foreach($data as $item)
                            <div id="panelsStayOpen" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading">
                                <div class="accordion-body">
                                        <div class="col-lg-12">
                                            <div class="card shadow-none mb-3">
                                                <div class="card-body p-lg-3 p-2">
                                                    <div class="d-flex align-items-center gap-3 mb-3">
                                                        <div class="avatar-md flex-shrink-0">
                                                            <span class="avatar-title bg-light rounded-circle">
                                                                {{-- <iconify-icon icon="iconamoon:file-document-duotone" class="@if($ajuan->status == 'pending') text-warning  @elseif($ajuan->status == 'approved') text-success @else text-danger @endif fs-28"></iconify-icon> --}}
                                                                <iconify-icon icon="iconamoon:file-document-duotone" class="@if ($item->is_accepted == 'pending') text-warning @elseif ($item->is_accepted == 'approved') text-success @else text-danger
                                                                @endif fs-28"></iconify-icon>
                                                            </span>
                                                        </div>
                                                        <div class="d-block">
                                                            <h5 class="mb-1">
                                                                {{ ucfirst($item->jenis_izin) }}
                                                            </h5>
                                                            <h6 class="mb-0 text-muted">
                                                                {{ $item->users->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center gap-2">
                                                        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-1 gap-md-2">
                                                            <h5 class="card-title badge text-secondary d-flex gap-1 align-items-center py-1 px-2 fs-13 mb-3 border rounded-1">
                                                                <iconify-icon icon="iconamoon:calendar-2-duotone"></iconify-icon>
                                                                {{ $item->created_at->format('d M Y') }}
                                                            </h5>
                                                            <h5 class="card-title badge 
                                                            @if($item->is_accepted == 'pending') bg-warning
                                                            @elseif($item->is_accepted == 'approved') bg-success
                                                            @else bg-danger
                                                            @endif
                                                            text-white d-flex gap-1 align-items-center py-1 px-2 fs-13 mb-3 border rounded-1">
                                                                @if ($item->is_accepted == 'pending') Pending @elseif ($item->is_accepted == 'approved') Disetujui @else Ditolak
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
