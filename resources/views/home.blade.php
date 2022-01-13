@extends('layouts.default')
@section('titlePage') List User @endsection

@section('konten')
<form action="{{Route('search')}}" method="get" class="mb-3">
 <div class="row">
   <div class="col-md-5">
    <div class="form-group">
      <input type="text" value="{{ $search ? $search : "" }}" class="form-control form-control-sm" name="search" placeholder="Input A Name or Email">
    </div>
   </div>
   <div class="col-md-6">
   <div class="d-flex">
    <select class="form-select form-select-sm" name="order">
      <option value="name-ASC" {{$orderKey === "name-ASC" ? "selected" : ""}}>Abjad A - Z {{$orderKey}} </option>
      <option value="name-DESC" {{$orderKey === "name-DESC" ? "selected" : ""}}>Abjad Z - A  </option>
      <option value="created_at-DESC" {{$orderKey === "created_at-DESC" ? "selected" : ""}}>Tanggal Terbaru </option>
      <option value="created_at-ASC" {{$orderKey === "created_at-ASC" ? "selected" : ""}}>Tanggal Terlama </option>
    </select>
    <button class="btn btn-primary btn-sm mx-3">Search</button>
   </div>
  </div>
 </div>
</form>
<table class="table table-bordered text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo Profile</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No Telp</th>
        <th scope="col">Tgl Join</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($user as $item)
      <tr>
        <th scope="row">{{$loop->iteration + $user->firstItem() - 1}}</th>
        <td>
            <img src="{{$item->profile ? "storage/images/".$item->profile : "admin.jpg" }}" class="rounded-circle" style="width:50px;height:50px" alt="...">
        </td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->no_telp}}</td>
        <td>{{$item->created_at->format('d - M - Y')}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$user->appends(request()->query())->links()}}
@endsection