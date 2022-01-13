@extends('layouts.app')
@section('titlePage') @yield('titlePage') @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">@yield('titlePage')</div>
                <div class="card-body">
                  @yield('konten')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
