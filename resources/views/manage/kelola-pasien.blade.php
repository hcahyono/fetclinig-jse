@extends('admin')

@section('contents')
	<h2>Pemilik hewan peliharaan</h2>
    <ul class="list-group">
      <li class="list-group-item">Nama pemilik : <strong>{{($pasien->nama != "" ? $pasien->nama : "-" )}}</strong></li>
      <li class="list-group-item">Kode pemilik : <strong>{{($pasien->kode != "" ? $pasien->kode : "-" )}}</strong></li>
      <li class="list-group-item">Gender : <strong>{{($pasien->gender != "" ? $pasien->gender : "-" )}}</strong></li>
      <li class="list-group-item">Handphone : <strong>{{($pasien->handphone != "" ? $pasien->handphone : "-" )}}</strong></li>
      <li class="list-group-item">Telepon : <strong>{{($pasien->telepon != "" ? $pasien->telepon : "-" )}}</strong></li>
      <li class="list-group-item">Alamat :  <strong>{{($pasien->alamat != "" ? $pasien->alamat : "-" )}}</strong></li>
      <li class="list-group-item">Aksi :  <br>
        <form method="POST" action="{{route('action.pasien', [$pasien->id])}}" >
          @csrf
          <input type="hidden" name="_method" value="POST">
          
          <input type="submit" name="action" value="Kembalikan data" class="btn btn-info btn-sm float-right">
        </form>
      </li>
    </ul>
@endsection