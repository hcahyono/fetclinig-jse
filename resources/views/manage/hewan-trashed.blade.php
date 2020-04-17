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
      @if (count($hewans))
        @foreach($hewans as $hewan)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ ($hewan->pasien ? $hewan->pasien->nama : "-" ) }}</td>
            <td>{{ $hewan->nama }}</td>
            <td>{{ $hewan->jenis }}</td>
            <td>{{ $hewan->gender }}</td>
            <td>
              <a href="{{route('kelola.hewan',[$hewan->id])}}" class="btn btn-link btn-sm">View</a>
            </td>
          </tr>
        @endforeach
      @else
       <tr>
         <td colspan="6">data tidak ditemukan</td>
       </tr>
      @endif
    </tbody>
  </table>

  <div class="text-center mx-auto">
    {{ $hewans->links() }}
  </div>

@endsection