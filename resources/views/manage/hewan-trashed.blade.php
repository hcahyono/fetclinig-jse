@extends('admin')

@section('contents')
	<h2>Trash hewan peliharaan</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama pemilik</th>
        <th>Nama peliharaan</th>
        <th>Jenis hewan</th>
        <th>jenis kelamin</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($hewans as $hewan)
        @if (count($hewan->pasien()->withTrashed()->get()) > 0 )
          @foreach($hewan->pasien()->withTrashed()->get() as $pemilik)
            <tr>
              <td>{{$loop->parent->iteration}}</td>
              <td>{{ ($pemilik->nama != "" ? $pemilik->nama : "-" ) }}</td>
              <td>{{ ($hewan->nama != "" ? $hewan->nama : "-" ) }}</td>
              <td>{{ ($hewan->jenis != "" ? $hewan->jenis : "-" ) }}</td>
              <td>{{ ($hewan->gender != "" ? $hewan->gender : "-" ) }}</td>
              <td>
              	<a href="{{route('kelola.hewan',[$hewan->id])}}" class="btn btn-link btn-sm">View</a>
              </td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>

  <div class="text-center mx-auto">
    {{ $hewans->links() }}
  </div>

@endsection