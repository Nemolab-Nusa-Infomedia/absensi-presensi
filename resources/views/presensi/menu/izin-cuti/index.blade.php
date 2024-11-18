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

<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title">
                Izin Cuti
            </h5>
            <div class="ms-auto">
                <a href="#" class="text-primary">
                    Riwayat
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="col-md-12 mb-3">
                    <select class="form-control" data-choices name="choices-single-default" id="choices-single-default">
                        <option value="">Izin/Cuti</option>
                        <option value="Izin">Izin</option>
                        <option value="Cuti">Cuti</option>
                   </select>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                   </div>
                   <div class="col-6 col-md-6">
                       <div class="mb-3">
                           <label for="example-textarea" class="form-label">Dari</label>
                           <input type="date" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                        </div>
                    </div>
                   <div class="col-6 col-md-6">
                       <div class="mb-3">
                           <label for="example-textarea" class="form-label">Sampai</label>
                           <input type="date" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
