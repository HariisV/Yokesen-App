@extends('layouts.default')
@section('titlePage') List User @endsection

@section('konten')
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
  {{$user->links()}}
@endsection