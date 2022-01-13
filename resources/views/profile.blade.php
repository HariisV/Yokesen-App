@extends('layouts.default')
@section('titlePage') Update Profile @endsection
@section('konten')
    <div class="text-center">
        <img src="{{Auth::user()->profile ? "storage/images/".Auth::user()->profile : "admin.jpg" }}" class="img-thumbnail rounded-circle shadow" style="width:110px;height:110px" alt="...">
    </div>
    <form action="{{Route('updateProfile')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" id="inputNama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="inputNama" class="form-label">Nomor Telepon</label>
            <input type="number" id="inputNama" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{Auth::user()->no_telp}}">
            @error('no_telp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="inputNama" class="form-label">Alamat</label>
            <input type="text" id="inputNama" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{Auth::user()->name}}">
            @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="inputNama" class="form-label">Profile Image</label>
            <input type="file" id="inputNama" class="form-control  @error('image') is-invalid @enderror" name="image" accept="image/*">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="inputNama" class="form-label">Password</label>
            <input type="password" id="inputNama" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="********">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-5">
                Simpan
            </button>
        </div>
    </form>
@endsection