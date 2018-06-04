@extends('admin')

@section('contents')
	<h2>Trash pemilik hewan peliharaan</h2>
	<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama pemilik</th>
        <th>Kode</th>
        <th>Gender</th>
        <th>Handphone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($pasiens as $pasien)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{ ($pasien->nama != "" ? $pasien->nama : "-" ) }}</td>
        <td>{{ ($pasien->kode != "" ? $pasien->kode : "-" ) }}</td>
        <td>{{ ($pasien->gender != "" ? $pasien->gender : "-" ) }}</td>
        <td>{{ ($pasien->handphone != "" ? $pasien->handphone : "-" ) }}</td>
        <td>
        	<a href="{{route('kelola.pasien',[$pasien->id])}}" class="btn btn-link btn-sm">Kelola</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-center mx-auto">
    {{ $pasiens->links() }}
  </div>

@endsection