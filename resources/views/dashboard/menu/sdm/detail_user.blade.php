@extends('components.layout')

@section('content')
    <div class="col-lg-12">
    @if(session('success'))
    <div class="alert alert-success alert-icon" role="alert">
        <div class="d-flex align-items-center">
            <div class="avatar-sm rounded bg-success d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                <i class="bx bx-check-shield text-white"></i>
            </div>
            <div class="flex-grow-1">
                Berhasil !! {{ session('success') }}
            </div>
            <button type="button" class="btn-close px-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">
                Personal Info
            </h5>
            <button id="editProfile" class="btn btn-warning">Edit Profile</button>
        </div>
        <div class="card-body">
            <form action="{{ route('user-update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <ul class="list-group">
                <li class="list-group-item border-0 border-bottom px-0 pt-0">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img id="preview" src="{{ asset('storage/'.$user->profile_image) }}" class="rounded-circle text-center col-md-2" alt="">
                        <div id="editImage" class="mt-3 mb-3 d-none">
                            <input type="file" id="fileInput" name="profile_image" accept="image/*" class="form-control">
                        </div>
                        @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0 pt-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Nama :
                        </h5>
                        <span id="nameOld" class="fs-14 text-muted">{{ $user->name }}</span>
                        <input id="editName" name="name" class="form-control mt-3 d-none" value="{{ $user->name }}">
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Telepon :
                        </h5>
                        <span id="phoneOld" class="fs-14 text-muted">{{ $user->phone }}</span>
                        <input id="editPhone" name="phone" class="form-control mt-3 d-none" value="{{ $user->phone }}">
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Jenis Kelamin :
                        </h5>
                        <span id="genderOld" class="fs-14 text-muted">
                            @if($user->gender == 'male')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </span>
                    </div>
                    <div id="editGender" class="col-md-4 mt-3 d-none">
                        <select class="form-control" id="choices-single-no-search" name="gender" data-choices data-choices-search-false data-choices-removeItem>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Divisi :
                        </h5>
                         <span id="divisiOld" class="fs-14 text-muted">{{ $user->divisis->name }}</span>
                    </div>
                    <div id="editDivisi" class="col-md-4 mt-3 d-none">
                        <select class="form-control" id="choices-single-no-search" name="divisi_id" data-choices data-choices-search-false data-choices-removeItem>
                            @foreach($divisi as $list)
                            <option value="{{ $list->id }}" {{ $user->divisi_id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
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
                            @if($user->address)
                                <span class="fs-14 text-muted">{{ $user->address }}</span>
                            @else
                            -
                            @endif
                        </span>
                        <textarea id="editAddress" name="address" class="mt-3 form-control d-none">{{ $user->address }}</textarea>
                    </div>
                </li>
            </ul>
            <button class="btn btn-success d-block ms-auto mt-3 d-none" id="submitButton" type="submit">Simpan</button>
            </form>
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