@extends('admin')

@section('contents')
	<h2>Trash hewan peliharaan</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama peliharaan</th>
        <th>Jenis hewan</th>
        <th>jenis kelamin</th>
        <th>Ras</th>
        <th>Warna bulu</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($hewans as $hewan)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$hewan->nama}}</td>
          <td>{{$hewan->jenis}}</td>
          <td>{{$hewan->gender}}</td>
          <td>{{$hewan->ras}}</td>
          <td>{{$hewan->warna}}</td>
          <td>
          	<a href="{{route('kelola.hewan',[$hewan->id])}}" class="btn btn-link btn-sm">View</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-center mx-auto">
    {{ $hewans->links() }}
  </div>

@endsection