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
                <a href="">
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
        <div class="card-header">
            <h5 class="card-title">
                Personal Info
            </h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <form action="{{ route('user-update', ['id'=>Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <li class="list-group-item border-0 border-bottom px-0 pt-0">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img id="preview" src="{{ asset('storage/'.Auth::user()->profile_image) }}" class="rounded-circle text-center" width="200px" alt="">
                        <div id="editImage" class="mt-3 mb-3 d-none">
                            <input type="file" id="fileInput" name="profile_image" accept="image/*" class="form-control">
                        </div>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0 pt-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Nama :
                        </h5>
                        <span id="nameOld" class="fs-14 text-muted">{{ Auth::user()->name }}</span>
                        <input id="editName" name="name" class="form-control mt-3 d-none" value="{{ Auth::user()->name }}">
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Telepon :
                        </h5>
                        <span id="phoneOld" class="fs-14 text-muted">{{ Auth::user()->phone }}</span>
                        <input id="editPhone" name="phone" class="form-control mt-3 d-none" value="{{ Auth::user()->phone }}">
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Jenis Kelamin :
                        </h5>
                        <span id="genderOld" class="fs-14 text-muted">
                            @if(Auth::user()->gender == 'male')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </span>
                    </div>
                    <div id="editGender" class="col-md-4 mt-3 d-none">
                        <select class="form-control" id="choices-single-no-search" name="gender" data-choices data-choices-search-false data-choices-removeItem>
                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Divisi :
                        </h5>
                         <span id="divisiOld" class="fs-14 text-muted">{{ Auth::user()->divisis->name }}</span>
                    </div>
                    <div id="editDivisi" class="col-md-4 mt-3 d-none">
                        <select class="form-control" id="choices-single-no-search" name="divisi_id" data-choices data-choices-search-false data-choices-removeItem>
                            @foreach($divisi as $list)
                            <option value="{{ $list->id }}" {{ Auth::user()->divisi_id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Alamat :
                        </h5>
                        <span id="addressOld" class="fs-14 text-muted">
                            @if(Auth::user()->address)
                                <span class="fs-14 text-muted">{{ Auth::user()->address }}</span>
                            @else
                            -
                            @endif
                        </span>
                        <textarea id="editAddress" name="address" class="mt-3 form-control d-none">{{ Auth::user()->address }}</textarea>
                    </div>
                </li>
                <button class="btn btn-success d-block ms-auto mt-3 d-none" id="submitButton" type="submit">Simpan</button>
                </form>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <button id="editProfile" class="btn btn-info">Change Personal Info</button>
                        </h5>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="" class="btn btn-orange">Change Password</a>
                        </h5>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
        var editButton = document.getElementById("editProfile");
        var nameOld = document.getElementById("nameOld");
        var nameNew = document.getElementById("editName");
        var phoneOld = document.getElementById("phoneOld");
        var phoneNew = document.getElementById("editPhone");
        var genderOld = document.getElementById("genderOld");
        var genderNew = document.getElementById("editGender");
        var divisiOld = document.getElementById("divisiOld");
        var divisiNew = document.getElementById("editDivisi");
        var addressOld = document.getElementById("addressOld");
        var addressNew = document.getElementById("editAddress");
        var submitButton = document.getElementById("submitButton");
        var editImage = document.getElementById("editImage");

        const fileInput = document.getElementById('fileInput');
        const preview = document.getElementById('preview');

         fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        editButton.addEventListener("click", function() {
            nameOld.classList.toggle("d-none");
            nameNew.classList.toggle("d-none");
            phoneOld.classList.toggle("d-none");
            phoneNew.classList.toggle("d-none");
            genderOld.classList.toggle("d-none");
            genderNew.classList.toggle("d-none");
            divisiOld.classList.toggle("d-none");
            divisiNew.classList.toggle("d-none");
            addressOld.classList.toggle("d-none");
            addressNew.classList.toggle("d-none");
            submitButton.classList.toggle("d-none");
            editImage.classList.toggle("d-none");
        });
</script>
@endsection
