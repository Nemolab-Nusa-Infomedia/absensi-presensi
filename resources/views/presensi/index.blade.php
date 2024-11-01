@extends('components.PresensiView.components.layout')

@section('content')
<div class="text-center mt-2" style="color: #003F77">
    <span class="fw-bold fs-3 py-2">Hallo 👋 {{ Auth::user()->name }}</span class="fw-bold fs-3">
    <p>Semangat Kerja ya!</p>
</div>
<div class="presensi px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center text-center gap-2">
                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center text-center gap-1">
                    <i class='bx bx-arrow-to-right fs-4'></i>
                    <div class="row text-center">
                        <span>Masuk</span>
                        <span style="font-size: 8px">08:42:05 WIB</span>
                    </div>
                </a>
                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center text-center gap-1">
                    <i class='bx bx-arrow-from-right fs-4'></i>
                    <div class="row text-center">
                        <span>Keluar</span>
                        <span style="font-size: 8px">08:42:05 WIB</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row col-12 col-md-12 mx-auto justify-content-center">
    <div class="col-4 col-md-4 text-center">
        <img src="{{ url('assets/images/apk-presensi/menu/people.png') }}" alt="">
        <p>Laporan Presensi</p>
    </div>
    <div class="col-4 col-md-4 text-center">
        <img src="{{ url('assets/images/apk-presensi/menu/people.png') }}" alt="">
        <p>Izin/Cuti</p>
    </div>
    <div class="col-4 col-md-4 text-center">
        <img src="{{ url('assets/images/apk-presensi/menu/people.png') }}" alt="">
        <p>Akun</p>
    </div>
</div>

<div class="pengumuman p-2">
    <div class="d-flex justify-content-between">
        <h3>Pengumuman</h3>
        <a href="#">Lihat Lainnya</a>
    </div>
    <div class="row  gap-2">
        <div class="col-12">
            <div class="d-flex gap-2 align-items-center">
                <img src="{{ url('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="">
                <div class="text-start">
                    <h3>Work From Home</h3>
                    <p>Rabu, Kamis, Jumat di minggu ke 3 & 4 jadwalnya WFH</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex gap-2 align-items-center">
                <img src="{{ url('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="">
                <div class="text-start">
                    <h3>Work From Home</h3>
                    <p>Rabu, Kamis, Jumat di minggu ke 3 & 4 jadwalnya WFH</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex gap-2 align-items-center">
                <img src="{{ url('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="">
                <div class="text-start">
                    <h3>Work From Home</h3>
                    <p>Rabu, Kamis, Jumat di minggu ke 3 & 4 jadwalnya WFH</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
