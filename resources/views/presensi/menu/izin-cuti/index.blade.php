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
                <a href="{{ route('riwayat-izin-cuti') }}" class="text-primary">
                    Riwayat
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('izin-cuti-store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="col-md-12 mb-3">
                    <select class="form-control" name="jenis_izin" data-choices id="choices-single-default">
                        <option value="izin">Izin</option>
                        <option value="cuti">Cuti</option>
                   </select>
                   @error('jenis_izin')
                       <div class="text-danger">{{ $message }}</div>
                   @enderror
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="example-textarea" rows="5"></textarea>
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                   </div>
                   <div class="col-6 col-md-6">
                       <div class="mb-3">
                           <label for="example-textarea" class="form-label">Dari</label>
                           <input type="date" name="tanggal_mulai" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                           @error('tanggal_mulai')
                               <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                   <div class="col-6 col-md-6">
                       <div class="mb-3">
                           <label for="example-textarea" class="form-label">Sampai</label>
                           <input type="date" name="tanggal_akhir" id="basic-datepicker" class="form-control" placeholder="Basic datepicker">
                            @error('tanggal_akhir')
                               <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
